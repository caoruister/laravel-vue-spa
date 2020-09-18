<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class CacheIPs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ip:2redis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        ini_set('memory_limit','1024M');
        $inputfile = storage_path('app/public/iptxt.txt');
        $starttime = explode(' ',microtime());

        $total = count(file($inputfile));
        //Redis::command('delete', ['iprange']);

        $arr = file($inputfile);

        Redis::pipeline(function ($pipe) use ($arr, $total) {

            if($arr) {

                $i=0;

                foreach($arr as $line) {
                    $line=str_replace(array("\n","\r"),"",$line);
                    list($start,$end,$startnum,$endnum,$continent,$country,$province, $city, $district,$isp,$areacode,$en,$cc,$lng,$lat) = explode("|", $line);
                    Redis::zAdd('iprange',intval($endnum),$line);
                    //也可自行手动添加
                    //$redis->zAdd('iprange',16781311, '亚洲|中国|广东|深圳|南山|电信|440100|China|CN|113.280637|23.125178');
                    $i++;
                    echo chr(3);
                    echo $i."/".$total." => ".round(($i/$total)*100)."%"."\r";
                }
            }
        });


        echo "\n\n";
        echo '数量:'.Redis::zCount('iprange', "-inf", "+inf")."\n";

        $result=Redis::zRangeByScore('iprange', 4294967295, 4294967295, array('limit' => array('offset' => 0, 'count' => 1)));
        echo '版本:'.$result[0]."\n";

        $endtime = explode(' ',microtime());
        $thistime = $endtime[0]+$endtime[1]-($starttime[0]+$starttime[1]);
        $thistime = round($thistime,3);
        echo "耗时:".$thistime."秒"."\n\n";
    }
}
