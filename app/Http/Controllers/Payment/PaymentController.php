<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        //生成交易单号
        $transaction = $request->user()->deposit($request->amount*100, null, false);
        // 调用支付宝的网页支付
        $config = [
            'out_trade_no' => $transaction->uuid, // 订单编号，需保证在商户端不重复
            'total_amount' => $request->amount, // 订单金额，单位元，支持小数点后两位
            'subject'      => '充值', // 订单标题
        ];
        return $request->isMobile ? app('alipay')->wap($config) : app('alipay')->web($config);
    }

    // 前端回调页面
    public function alipayReturn(Request $request)
    {
        try {
            // 校验提交的参数是否合法
            app('alipay')->verify();
        } catch (\Exception $e) {
            return response()->json(['isPayed' => true]);
        }
        return response()->json(['isPayed' => true]);
    }

    // 服务器端回调
    public function alipayNotify()
    {
        // 校验输入参数
        $data  = app('alipay')->verify();

        Log::debug('Alipay notify', $data->all());
        // 如果订单状态不是成功或者结束，则不走后续的逻辑
        // 所有交易状态：https://docs.open.alipay.com/59/103672
        if(!in_array($data->trade_status, ['TRADE_SUCCESS', 'TRADE_FINISHED'])) {
            return app('alipay')->success();
        }

        //确认交易
        $transaction = Transaction::where('uuid', $data->out_trade_no)->firstOrFail();
        $transaction->meta = $data->all();
        $transaction->wallet->confirm($transaction);

        return app('alipay')->success();
    }
}
