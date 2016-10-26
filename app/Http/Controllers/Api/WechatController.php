<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;

class WechatController extends  Controller {


    public function __construct()
    {

        $this->options = [

            'app_id' => config("wechat.app_id"),
            // payment
            'payment' => [
                'merchant_id'        => config("wechat.payment.merchant_id"),
                'key'                => config("wechat.payment.key"),
                'cert_path'          => config("wechat.payment.cert_path"), // XXX: 绝对路径！！！！
                'key_path'           => config("wechat.payment.key_path"),  // XXX: 绝对路径！！！！
                'notify_url'         => config("wechat.payment.notify_url"),// 你也可以在下单时单独设置来想覆盖它
                'device_info'        => config("wechat.payment.device_info"),
            ],
        ];
    }


    public function wechatPay()
    {
        $app = new Application($this->options);

        $payment = $app->payment;
        $order_number = date("YmdHis");

        $goods_name = request("goods_name","iPad mini 16G 白色");
        $detail = request("detail","iPad mini 16G 白色");
        $price = request("price",1);
        //创建订单
        $attributes = [
            'body'             => $goods_name,
            'detail'           => $detail,
            'out_trade_no'     => $order_number,
            'total_fee'        => $price,
            'trade_type'       =>"APP",
        ];

        $order = new Order($attributes);

        $result = $payment->prepare($order);

        dd($result);

        $prepayId = $result->prepay_id;

        $config = $payment->configForAppPayment($prepayId);

        return response()->json($config);
    }
}
