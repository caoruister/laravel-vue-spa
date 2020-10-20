<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Overtrue\EasySms\EasySms;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    protected function registered(Request $request, User $user)
    {
        if ($user instanceof MustVerifyEmail) {
            return response()->json(['status' => trans('verification.sent')]);
        }

        return response()->json($user);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'name' => 'required|max:255',
            //'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'verification_key' => 'nullable|string',
            'verification_code' => 'required|string',
        ], [
        ], [
            'verification_key' => '短信验证码 key',
            'verification_code' => '短信验证码',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $verifyData = Cache::get($data['verification_key']);

        if (!$verifyData) {
            //abort(403, '验证码已失效');
            throw ValidationException::withMessages([
                'verification_code' => ['短信验证码已失效'],
            ]);
        }

        if (!hash_equals($verifyData['code'], $data['verification_code'])) {
            // 返回401
            //throw new AuthenticationException('验证码错误');
            throw ValidationException::withMessages([
                'verification_code' => ['短信验证码错误'],
            ]);
        }

        $user = User::create([
            'name' => $verifyData['phone'],
            'phone' => $verifyData['phone'],
            //'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // 清除验证码缓存
        Cache::forget($data['verification_key']);

        return $user;
    }

    /**
     * @param Request $request
     * @param EasySms $easySms
     * @return \Illuminate\Http\JsonResponse|object
     * @throws ValidationException
     * @throws \Overtrue\EasySms\Exceptions\InvalidArgumentException
     */
    public function store(Request $request, EasySms $easySms)
    {
        //验证表单
        $this->validate($request, [
            'phone' => [
                'required',
                'regex:/^1(3\d|4[5-8]|5[0-35-9]|6[567]|7[01345-8]|8\d|9[025-9])\d{8}$/',
                'unique:users',
            ],
            'captcha_key' => 'required|string',
            'captcha_code' => 'required|string',
        ], [], [
            'phone' => '手机号码',
            'captcha_key' => '图片验证码 key',
            'captcha_code' => '图片验证码',
        ]);

        $captchaData = Cache::get($request->captcha_key);

        if (!$captchaData) {
            //abort(403, '图片验证码已失效');
            throw ValidationException::withMessages([
                'captcha_code' => ['图片验证码已失效'],
            ]);
        }

        if(!captcha_api_check($request->captcha_code, $captchaData['code'], 'flat'))
        {
            // 验证错误就清除缓存
            Cache::forget($request->captcha_key);
            //throw new AuthenticationException('图片验证码错误');
            throw ValidationException::withMessages([
                'captcha_code' => ['图片验证码错误'],
            ]);
        }

        $phone = $request->phone;

        if (!app()->environment('production')) {
            $code = '1234';
        } else {
            // 生成4位随机数，左侧补0
            $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);

            try {
                $result = $easySms->send($phone, [
                    'template' => config('easysms.gateways.aliyun.templates.register'),
                    'data' => [
                        'code' => $code
                    ],
                ]);
            } catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
                $message = $exception->getException('aliyun')->getMessage();
                abort(500, $message ?: '短信发送异常');
            }
        }

        $key = 'verificationCode_'.Str::random(15);
        $expiredAt = now()->addMinutes(5);
        // 缓存验证码 5 分钟过期。
        Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);
        // 清除图片验证码缓存
        Cache::forget($request->captcha_key);

        return response()->json([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);
    }
}
