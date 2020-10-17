<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Mews\Captcha\Captcha;

class CaptchasController extends Controller
{
    //
    public function store(Request $request, Captcha $captchaBuilder)
    {
        $this->validate($request, [
            'phone' => [
                'nullable',
                'regex:/^1(3\d|4[5-8]|5[0-35-9]|6[567]|7[01345-8]|8\d|9[025-9])\d{8}$/',
                'unique:users',
            ],
        ], [], [
            'phone' => '手机号码'
        ]);

        $key = 'captcha-'.Str::random(15);
        $phone = $request->phone;

        $captcha = $captchaBuilder->create('flat', true);
        $expiredAt = now()->addMinutes(2);
        Cache::put($key, ['phone' => $phone, 'code' => $captcha['key']], $expiredAt);

        $result = [
            'captcha_key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
            'captcha_img' => $captcha['img']
        ];

        return response()->json($result)->setStatusCode(201);
    }
}
