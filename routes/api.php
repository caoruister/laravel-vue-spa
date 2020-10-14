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

    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');
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

    // 短信验证码
    Route::post('phone/verificationCodes', 'Auth\VerificationController@store')
        ->middleware('throttle:' . config('api.rate_limits.sign'))
        ->name('verificationCodes.store');

    // 图片验证码
    //Route::post('captchas', 'CaptchasController@store')->name('captchas.store');

    // 搜集IP
    Route::patch('/ads', 'IP\VPSController@ipGather');
});

// 风险检测
Route::post('risk/check', 'Risk\RiskController@pass');
