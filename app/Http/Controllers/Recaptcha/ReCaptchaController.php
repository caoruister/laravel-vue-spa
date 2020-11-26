<?php

namespace App\Http\Controllers\Recaptcha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReCaptchaController extends Controller
{
    //
    public function validate(Request $request) {

        $this->validate($request, [
            'token' => [
                'required',
            ],
        ], [], [
            'token' => '客户端token'
        ]);

        $postdata = http_build_query(array(
            'secret' => '6LclXewZAAAAAIi0DaXeVi2_hvIc3tN2BTSDf7Yk',
            'response' => $request->token,
            'remoteip' => $request->ip()
        ));

        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => $postdata,
                'timeout' => 15 * 60 // 超时时间（单位:s）
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents('https://www.recaptcha.net/recaptcha/api/siteverify', false, $context);

        $recaptcha_result = json_decode($result);

        return response()->json($recaptcha_result);
    }
}
