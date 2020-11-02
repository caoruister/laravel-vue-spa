<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    //
    public function payByAlipay(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric',
        ], [], [
            'amount' => '充值金额'
        ]);

        $orderId = Str::uuid();
        // 调用支付宝的网页支付
        return app('alipay')->web([
            'out_trade_no' => $orderId, // 订单编号，需保证在商户端不重复
            'total_amount' => $request->amount, // 订单金额，单位元，支持小数点后两位
            'subject'      => '充值', // 订单标题
        ]);
    }

    // 前端回调页面
    public function alipayReturn(Request $request)
    {
        try {
            $request->user()->deposit($request->total_amount*100, $request->all());

            // 校验提交的参数是否合法
            app('alipay')->verify();
        } catch (\Exception $e) {
            return response()->json(['isPayed' => true]);
        }
        return response()->json(['isPayed' => true]);
    }

    // 服务器端回调
    public function alipayNotify(Request $request)
    {
        // 校验输入参数
        $data  = app('alipay')->verify();

        Log::debug('Alipay notify', $data->all());
        // 如果订单状态不是成功或者结束，则不走后续的逻辑
        // 所有交易状态：https://docs.open.alipay.com/59/103672
        if(!in_array($data->trade_status, ['TRADE_SUCCESS', 'TRADE_FINISHED'])) {
            return app('alipay')->success();
        }

        return app('alipay')->success();
    }
}
