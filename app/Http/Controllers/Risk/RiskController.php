<?php

namespace App\Http\Controllers\Risk;

use App\Http\Controllers\Controller;
use App\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RiskController extends Controller
{
    //
    public function pass(Request $request)
    {
        //验证表单
        $this->validator($request->all())->validate();

        $result = array();

        if ($request->ip) {
            $ipData = $this->checkIP($request->ip);
            $result['ipData'] = $ipData;
        }

        if ($request->phone) {
            $phoneData = $this->checkPhone($request->phone);
            $result['phoneData'] = $phoneData;
        }

        return response()->json($result);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ip' => 'nullable|ip',
            'phone' => [
                'nullable',
                'regex:/^1(3\d|4[14-8]|5[0-35-9]|6[567]|7[012345-8]|8\d|9[025-9])\d{8}$/'
            ],
            'idCard' => 'nullable',
            'bankNum' => 'nullable'
        ], [], [
            'ip' => 'IP地址',
            'phone' => '手机号码',
            'idCard' => '身份证号码',
            'bankNum' => '银行卡号码'
        ]);
    }

    protected function checkIP($ip)
    {
        $starttime = explode(' ', microtime());
        $unistring = Redis::zRangeByScore('iprange', ip2long($ip), ip2long($ip) + 256 * 256 * 256, array('limit' => array('offset' => 0, 'count' => 1)));

        $area_info = $unistring[0];
        list($start, $end, $istart, $iend, $continent, $country, $state, $city, $district, $operator, $company, $type, $en, $ec, $lng, $lat) = explode(",", $area_info);

        $data = array(
            'ip' => $ip,
            'continent' => $continent,
            'country' => $country,
            'province' => $state,
            'city' => $city,
            'district' => $district,
            'operator' => $operator,
            'company' => $company,
            'type' => $type,
            'en' => $en,
            'ec' => $ec,
            'lng' => $lng,
            'lat' => $lat
        );

        $endtime = explode(' ', microtime());
        $thistime = $endtime[0] + $endtime[1] - ($starttime[0] + $starttime[1]);
        $thistime = round($thistime, 3);

        Log::debug('Query Cost:' . $thistime . '\'s for' . $ip);

        return $data;
    }

    protected function checkPhone($phone)
    {
        $data = array();

        try {
            //运营商查询
            $carrier = Cache::remember('phone.'.$phone, 60*60*24*30, function () use ($phone) {
                $api_url = 'https://tcc.taobao.com/cc/json/mobile_tel_segment.htm?tel='.urlencode($phone);
                $contents = file_get_contents( $api_url );

                preg_match_all("/(\w+):'([^']+)/", $contents, $m);
                $data = array_combine($m[1], $m[2]);

                //return mb_convert_encoding($data['carrier'], 'UTF-8', 'GBK');
                return iconv('GBK', 'UTF-8//IGNORE', $data['carrier']);
            });

            //类型判断
            if (Str::startsWith($phone, ['1440', '1441', '147', '148', '172', '145', '146', '1410', '149'])) {
                $type = 'USIM数据卡';
            } elseif (Str::startsWith($phone, ['17400', '17401', '17402', '17403', '17404', '17405', '1749'])) {
                $type = '卫星电话卡';
            } elseif (Str::startsWith($phone, ['162', '165', '167', '170', '171'])) {
                $type = '虚拟运营商';
            } else {
                $type = 'USIM手机卡';
            }

            //手机号码库查询
            $count = Phone::where('phone', $phone)->count();
            if ($count > 0) {
                $type = '黑名单';
            }

            $data = array(
                'phone' => $phone,
                'carrier' => $carrier,
                'type' => $type
            );
        } catch (\Exception $e) {
            Log::error('query carrier by taobao error:'.$e);
            return $data;
        }

        return $data;
    }
}
