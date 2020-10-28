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
            'subject'      => '充值 '.config('app.name'), // 订单标题
        ]);
    }

    // 前端回调页面
    public function alipayReturn()
    {
        try {
            // 校验提交的参数是否合法
            $data = app('alipay')->verify();
            Log::debug($data);
        } catch (\Exception $e) {
            response()->json(['isPayed' => false]);
        }

        response()->json(['isPayed' => true]);
    }

    // 服务器端回调
    public function alipayNotify()
    {
        // 校验输入参数
        $data  = app('alipay')->verify();
        // 如果订单状态不是成功或者结束，则不走后续的逻辑
        // 所有交易状态：https://docs.open.alipay.com/59/103672
        if(!in_array($data->trade_status, ['TRADE_SUCCESS', 'TRADE_FINISHED'])) {
            return app('alipay')->success();
        }
        // $data->out_trade_no 拿到订单流水号，并在数据库中查询
        /*$order = Order::where('no', $data->out_trade_no)->first();
        // 正常来说不太可能出现支付了一笔不存在的订单，这个判断只是加强系统健壮性。
        if (!$order) {
            return 'fail';
        }
        // 如果这笔订单的状态已经是已支付
        if ($order->paid_at) {
            // 返回数据给支付宝
            return app('alipay')->success();
        }
        $order->update([
            'paid_at'        => Carbon::now(), // 支付时间
            'payment_method' => 'alipay', // 支付方式
            'payment_no'     => $data->trade_no, // 支付宝订单号
        ]);*/

        return app('alipay')->success();
    }
}
