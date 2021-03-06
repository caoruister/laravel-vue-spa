<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', 'Auth\UserController@current');

    Route::get('/user/account', 'Auth\UserController@current');

    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');

    // 调用支付宝支付
    Route::post('payment/alipay', 'Payment\PaymentController@payByAlipay')->name('payment.alipay');

    // 支付宝同步通知
    Route::get('payment/alipay/return', 'Payment\PaymentController@alipayReturn')->name('payment.alipay.return');

    // IP检测
    Route::post('risk/check/ip', 'Risk\RiskController@checkIP');
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register')
        ->middleware('throttle:' . config('api.rate_limits.sign'));

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('email/verify/{user}', 'Auth\VerificationController@verify')
        ->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')
        ->name('oauth.callback');

    // 图片验证码
    Route::post('captchas', 'Auth\CaptchasController@store');

    // 注册短信验证码
    Route::post('register/verificationCodes', 'Auth\RegisterController@store')
        ->middleware('throttle:' . config('api.rate_limits.sign'));

    // 重设密码短信验证码
    Route::post('reset/verificationCodes', 'Auth\ResetPasswordController@store')
        ->middleware('throttle:' . config('api.rate_limits.sign'));

    // 支付宝异步通知
    Route::post('payment/alipay/notify', 'Payment\PaymentController@alipayNotify')->name('payment.alipay.notify');

    // 搜集IP
    Route::patch('/ads', 'IP\VPSController@ipGather');
});

// 风险检测
Route::post('risk/check', 'Risk\RiskController@pass');

// Google Recaptcha V3
Route::post('validate', 'Recaptcha\ReCaptchaController@validate');
