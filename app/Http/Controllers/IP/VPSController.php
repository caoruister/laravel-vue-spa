<?php

namespace App\Http\Controllers\IP;

use App\Http\Controllers\Controller;
use App\IP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class VPSController extends Controller
{
    const TYPE_VPS = 'vps';
    //
    public function ipGather(Request $request)
    {
        $ip = $request->ip();
        $userAgent = $request->userAgent();

        Log::info('ip：'.$ip.' user agent：'.$userAgent);

        if (Str::contains($userAgent,'curl')) {
            $ip = IP::where('ip', ip2long($request->ip()))->first();
            if ($ip) {
                $ip->fill(['type' => self::TYPE_VPS])->touch();
            } else {
                IP::create([
                    'ip' => ip2long($request->ip()),
                    'type' => self::TYPE_VPS,
                ]);
            }
        }

        return response()->json([
            'status' => '成功',
        ]);
    }
}
