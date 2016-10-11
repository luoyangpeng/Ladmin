<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;

class WechatController extends Controller
{

    /**
     * 图灵api地址
     * @var string
     */
    protected $api;
    private $key;

    public function __construct() 
    {
        $this->middleware("wechat.oauth",['only'=>'pay']);
        $this->api = env('TULING_API');
        $this->key = env('TULING_KEY');
    }


    

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        $wechat = app('wechat');
        $user = $wechat->user;
        $wechat->server->setMessageHandler(function($message) use ($user) {
              $fromUser = $user->get($message->FromUserName);
               if ($message->MsgType == 'event') {

                    switch ($message->Event) {
                        case 'subscribe':
                            return "{$fromUser->nickname} 欢迎关注 iadmin";
                            break;
                         case 'unsubscribe':
                            return "{$fromUser->nickname} 走好不送";
                        break;
                        default:
                            break;
                    }
                }
                if($message->MsgType == 'text') {
                     $post_data = json_encode(['key'=>$this->key,'info'=>$message->Content]);
                     $content = json_decode(curlRequest($this->api,$post_data),true);
                     return $content['text'];

                }

        });

        return $wechat->server->serve();
    }

    public function pay()
    {

    
        $options = [

            'app_id' => env('WECHAT_APPID'),
            // payment
            'payment' => [
                'merchant_id'        => env('WECHAT_PAYMENT_MERCHANT_ID'),
                'key'                => env('WECHAT_PAYMENT_KEY'),
                'cert_path'          => env('WECHAT_PAYMENT_CERT_PATH'), // XXX: 绝对路径！！！！
                'key_path'           => env('WECHAT_PAYMENT_KEY_PATH'),  // XXX: 绝对路径！！！！
                'notify_url'         => env('WECHAT_PAYMENT_NOTIFY_URL'),// 你也可以在下单时单独设置来想覆盖它
                'device_info'     => env('WECHAT_PAYMENT_DEVICE_INFO'),
            ],
        ];

       $user =  $user = session('wechat.oauth_user');

        $app = new Application($options);
     
        $payment = $app->payment;
        $order_number = date("YmdHis");

        $goods_name = request("goods_name","iPad mini 16G 白色");
        $detail = request("detail","iPad mini 16G 白色");
        //创建订单
        $attributes = [
            'body'             => $goods_name,
            'detail'           => $detail,
            'out_trade_no'     => $order_number,
            'total_fee'        => 1,
            'trade_type'       =>"JSAPI",
            'openid' => $user->id,
        ];

        $order = new Order($attributes);

        $result = $payment->prepare($order);
        
        $prepayId = $result->prepay_id;

        $json = $payment->configForPayment($prepayId);

        return view("web.wechat.pay",compact('json','goods_name'));
    }


   

}