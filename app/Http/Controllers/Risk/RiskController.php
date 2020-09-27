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
        $unistring = Redis::zRangeByScore('iprange', ip2long($ip), ip2long("255.0.0.0"), array('limit' => array('offset' => 0, 'count' => 1)));

        $area_info = $unistring[0];
        list($start,$end,$startnum,$endnum,$continent,$country,$province, $city, $district,$isp,$areacode,$en,$cc,$lng,$lat) = explode("|", $area_info);

        $data = array(
            'ip'=>$ip,
            'continent'=>$continent,
            'country'=>$country,
            'province'=>$province,
            'city'=>$city,
            'district'=>$district,
            'isp'=>$isp,
            'areacode'=>$areacode,
            'en'=>$en,
            'cc'=>$cc,
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
