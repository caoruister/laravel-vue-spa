<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Overtrue\EasySms\EasySms;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

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
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetResponse(Request $request, $response)
    {
        return ['status' => trans($response)];
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json(['email' => trans($response)], 400);
    }

    public function store(Request $request, EasySms $easySms)
    {
        //验证表单
        $this->validate($request, [
            'phone' => [
                'required',
                'regex:/^1(3\d|4[5-8]|5[0-35-9]|6[567]|7[01345-8]|8\d|9[025-9])\d{8}$/',
                'exists:users',
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
                    'template' => config('easysms.gateways.aliyun.templates.reset'),
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

    public function reset(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6',
            'verification_key' => 'nullable|string',
            'verification_code' => 'required|string',
        ]);

        $verifyData = Cache::get($request->verification_key);

        if (!$verifyData) {
            throw ValidationException::withMessages([
                'verification_code' => ['验证码已失效'],
            ]);
        }

        if (!hash_equals($verifyData['code'], $request->verification_code)) {
            throw ValidationException::withMessages([
                'verification_code' => ['验证码错误'],
            ]);
        }

        $user = User::where('phone', $verifyData['phone'])->first();

        $this->resetPassword($user, $request->password);

        Cache::forget($request->verification_key);

        return $this->sendResetResponse($request, '重置密码成功，请重新登陆');
    }
}
