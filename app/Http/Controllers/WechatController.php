<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;

class WechatController extends Controller
{


    public function __construct() 
    {
        $this->middleware("wechat.oauth",['only'=>'test']);
    }


    /**
     * 图灵api地址
     * @var string
     */
    protected $api = "http://www.tuling123.com/openapi/api";
    private $key = "440d51245801430c9f12afbdaf070637";

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

            'app_id' => 'wxb3c7d034b1ec511a',
            // payment
            'payment' => [
                'merchant_id'        => '1398575402',
                'key'                => 'GiSMc8nQOT0oKhyL25NsZkXvwtamYpCq',
                'cert_path'          => config_path()."/cert/apiclient_cert.pem", // XXX: 绝对路径！！！！
                'key_path'           => config_path()."/cert/apiclient_key.pem",      // XXX: 绝对路径！！！！
                'notify_url'         => 'https://www.iyoulang.cc/wechat/callback/',       // 你也可以在下单时单独设置来想覆盖它
                'device_info'     =>'web',
            ],
        ];

       $user =  $user = session('wechat.oauth_user');

        $app = new Application($options);
     
        $payment = $app->payment;
        $order_number = date("YmdHis");

        //创建订单
        $attributes = [
            'body'             => 'iPad mini 16G 白色',
            'detail'           => 'iPad mini 16G 白色',
            'out_trade_no'     => $order_number,
            'total_fee'        => 1,
            'trade_type'       =>"JSAPI",
            'openid' => $user->id,
        ];

        $order = new Order($attributes);

        $result = $payment->prepare($order);
        $prepayId = $result->prepay_id;

        $json = $payment->configForPayment($prepayId);

        return view("web.wechat.pay",compact('json'));
    }


    public function test()
    {
        dd(session("wechat.oauth_user"));
    }

}