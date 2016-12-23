<?php

namespace App\Http\Controllers\Api;

use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;
use App\Services\ApiResponseService;
use App\Lib\Code;


class WechatController extends  ApiBaseController {


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

     /**
     * @SWG\Post(
     *     path="/v1/pay",
     *     tags={"App Interface"},
     *     summary="测试接口",
     *     description="移动端app支付接口",
     *     operationId="wechatPay",
     *     produces={"application/json", "application/xml"},
     * @SWG\Response(response=200, description="succes"),
     * @SWG\Response(response=500, description="service error"),
     * @SWG\Response(response=404, description="not found")   
     * )
     */
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
            'trade_type'       => "APP",
        ];

        $order = new Order($attributes);

        $result = $payment->prepare($order);

        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){
            $prepayId = $result->prepay_id;
        } else {
            return ApiResponseService::showError(Code::WEIXIN_APP_PATNENT_ERROR);
        }


        $config = $payment->configForAppPayment($prepayId);

        return response()->json($config);
    }



     /**
     * @SWG\Post(
     *     path="/v1/test",
     *     tags={"test"},
     *     summary="测试接口",
     *     description="测试接口",
     *     operationId="test",
     *     produces={"application/json", "application/xml"},
     *     @SWG\Parameter(
     *     name="username",
     *     in="query",
     *     description="The user name for login",
     *     required=false,
     *     type="string"
     *   ),
     * @SWG\Parameter(
     *     name="password",
     *     in="query",
     *     description="The password for login in clear text",
     *     required=false,
     *     type="string"
     *   ),
     * @SWG\Response(response=200, description="succes"),
     * @SWG\Response(response=500, description="service error"),
     * @SWG\Response(response=404, description="not found")
     * )
     */
    public function test() {

        $data = [
            'name' => '老万',
            'sex'  => '男',
        ];
        return ApiResponseService::success($data,200,'success');
    }
}
