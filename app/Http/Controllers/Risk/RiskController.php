<?php

namespace App\Http\Controllers\Risk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class RiskController extends Controller
{
    //
    public function checkIP($ip)
    {
        $starttime = explode(' ',microtime());
        $unistring = Redis::zRangeByScore('iprange', ip2long($ip), ip2long($ip)+256*256*256, array('limit' => array('offset' => 0, 'count' => 1)));

        $area_info = $unistring[0];
        list($start,$end,$istart,$iend,$continent,$country,$state, $city, $district,$operator,$company,$type,$en,$ec,$lng,$lat) = explode(",", $area_info);

        $data =array(
            'ip'=>$ip,
            'continent'=>$continent,
            'country'=>$country,
            'province'=>$state,
            'city'=>$city,
            'district'=>$district,
            'operator'=>$operator,
            'company'=>$company,
            'type'=>$type,
            'en'=>$en,
            'ec'=>$ec,
            'lng'=>$lng,
            'lat'=>$lat
        );

        $endtime = explode(' ',microtime());
        $thistime = $endtime[0]+$endtime[1]-($starttime[0]+$starttime[1]);
        $thistime = round($thistime,3);

        Log::debug('Query Cost:'.$thistime.'\'s for'.$ip);

        return $data;
    }

    public function pass(Request $request)
    {
        $this->validate($request, ['ip' => 'required|ip']);

        $data = $this->checkIP($request->ip);

        return response()->json(['ipData' => $data]);
    }
}
