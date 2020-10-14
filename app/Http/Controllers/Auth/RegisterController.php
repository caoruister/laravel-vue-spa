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
use Illuminate\Validation\ValidationException;

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
                'verification_code' => ['验证码已失效'],
            ]);
        }

        if (!hash_equals($verifyData['code'], $data['verification_code'])) {
            // 返回401
            //throw new AuthenticationException('验证码错误');
            throw ValidationException::withMessages([
                'verification_code' => ['验证码错误'],
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
}
