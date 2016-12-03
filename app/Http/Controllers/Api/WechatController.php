<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;

/**
 * @SWG\Swagger(
 *     schemes={"http","https"},
 *     host="api.iadmin.com",
 *     basePath="/",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Ladmin API 管理中心",
 *         description="Ladmin API 接口管理中心",
 *         termsOfService="",
 *         @SWG\Contact(
 *             email="652008158@qq.com"
 *         ),
 *        
 *     ),
 *     @SWG\ExternalDocumentation(
 *         description="",
 *         url=""
 *     )
 * )
 */
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

     /**
     * @SWG\Post(
     *     path="/api/wechat_apy",
     *     description="移动端app支付接口",
     *     operationId="wechatPay",
     *     produces={"application/json", "application/xml", "text/xml", "text/html"},
     *     @SWG\Response(
     *         response=200,
     *         description="pet response",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/pet")
     *         ),
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *         @SWG\Schema(
     *             ref="#/definitions/errorModel"
     *         )
     *     )
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

        dd($result);

        $prepayId = $result->prepay_id;

        $config = $payment->configForAppPayment($prepayId);

        return response()->json($config);
    }



     /**
     * @SWG\Get(
     *     path="/api/test",
     *     description="Returns all pets from the system that the user has access to",
     *     operationId="test",
     *     produces={"application/json", "application/xml", "text/xml", "text/html"},
     *     @SWG\Parameter(
     *         name="tags",
     *         in="query",
     *         description="tags to filter by",
     *         required=false,
     *         type="array",
     *         @SWG\Items(type="string"),
     *         collectionFormat="csv"
     *     ),
     *     @SWG\Parameter(
     *         name="limit",
     *         in="query",
     *         description="maximum number of results to return",
     *         required=false,
     *         type="integer",
     *         format="int32"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="pet response",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/pet")
     *         ),
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *         @SWG\Schema(
     *             ref="#/definitions/errorModel"
     *         )
     *     )
     * )
     */
    public function test() {

    }
}
