<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;
use App\Repositories\OrderRepository;
use Log;
class WechatController extends Controller
{

    /**
     * 图灵api地址
     * @var string
     */
    protected $api;
    private $key;
    protected $options;

    /**
     * 使用者可以忽略
     *
     * @var
     */
    protected $url;

    public function __construct() 
    {
        $this->middleware("wechat.oauth",['only'=>'pay']);
        $this->middleware("wechat.oauth2",['only'=>'userInfo']);
        $this->api = config('tuling.api');
        $this->key = config('tuling.key');
        $this->url = config("url.ip_url");
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
                            return "{$fromUser->nickname} 欢迎关注 Ladmin";
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

       $user =  $user = session('wechat.oauth_user');

        $app = new Application($this->options);
     
        $payment = $app->payment;
        $order_number = date("YmdHis");

        $goods_name = request("goods_name","iPad mini 16G 白色");
        $detail = request("detail","iPad mini 16G 白色");
        $price = request("price",1);
        $company_name = request('company_name',"讯腾科技有限公司");
        $from = request('from','没有谁');
        //跳转地址
        $target_url = request('target_url','/');
        //创建订单
        $attributes = [
            'body'             => $goods_name,
            'detail'           => $detail,
            'out_trade_no'     => $order_number,
            'total_fee'        => $price,
            'trade_type'       =>"JSAPI",
            'openid' => $user->id,
        ];

        $order = new Order($attributes);



        $result = $payment->prepare($order);

        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){
            $prepayId = $result->prepay_id;
        }
        

        //创建数据库订单
        $data = [
            'goods_name' => $goods_name,
            'price' => $price/100,
             'order_number' => $order_number,
             'prepay_id' => $prepayId,
             'status' => 0,
            'openid' => $user->id,
            'from' => $from,
        ];

        $orderRepository = new OrderRepository();
        $orderRepository->store($data);

        $json = $payment->configForPayment($prepayId);


        return view("web.wechat.pay",compact('json','goods_name','price','company_name','target_url'));
    }


    /**
     * 微信支付回调
     * @itas
     * @DateTime 2016-10-11
     * @return   function   [description]
     */
    public function callback()
    {
        $app = new Application($this->options);
        $response = $app->payment->handleNotify(function($notify, $successful){
            $orderRepository = new OrderRepository();
            $order = $orderRepository->findOrderByOrderNumber($notify->out_trade_no);
            
            if (!$order) { // 如果订单不存在
                Log::info("Order not exist".$notify->out_trade_no);
                return 'Order not exist.'; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
            }
            $order = $order->find($order->id);
            // 如果订单存在
            // 检查订单是否已经更新过支付状态
            if ($order->pay_at) { // 假设订单字段“支付时间”不为空代表已经支付
                return true; // 已经支付成功了就不再更新了
            }

            // 用户是否支付成功
            if ($successful) {
                // 不是已经支付状态则修改为已经支付状态
                $order->pay_at = date("Y-m-d H:i:s"); // 更新支付时间为当前时间
                $order->status = 1;

                //叼毛要加的
                /*******可以删除********/
                $total_Fee = $notify->total_fee;
                $openid = $notify->openid;
                $order_number = $notify->out_trade_no;
                $from =  $order->from;
                $url = env('IP_URL')."?openid=$openid&total_Fee=$total_Fee&from=$from&order_number=$order_number";
                file_get_contents($url);
                /**********可以删除*************/


            } else { // 用户支付失败
                $order->status = -1;
            }

            $order->save(); // 保存订单

            return true; // 返回处理完成
        });

        return $response;
    }


    /**
     * 创建微信菜单
     *
     */
    public function createMenu()
    {
        $options = [
            'app_id'  => config('wechat.app_id'),         
            'secret'  => config('wechat.secret'),    
            'token'   => config('wechat.token'),        
            'aes_key' => config('wechat.aes_key'),
        ];
        $app = new Application($options);
        $menu = $app->menu;

        $buttons = [
            [
                "type" => "view",
                "name" => "百度一下(测试)",
                "url"  => "http://www.baidu.com"
            ],
            
        ];
        $menu->add($buttons);
    }


    /**
     * 微信分享
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function share()
    {
        $options = [
            'app_id'  => config('wechat.app_id'),
            'secret'  => config('wechat.secret'),
            'token'   => config('wechat.token'),
            'aes_key' => config('wechat.aes_key'),
        ];

        $app = new Application($options);
        $js = $app->js;

        //分享内容

        $data = [
            'title'  => request('title',"测试分享"),
            'desc'   => request('desc',"测试分享"),
            'imgUrl' => request('imgUrl','http://www.ecmaster.cn/Public/Ueditor/php/upload/20140731/14067731255989.png'),
            'link'   => request('link',"https://iyoulang.cc"),
        ];

        return view('web.wechat.share',compact('js','data'));
    }



   public function userInfo()
   {
        $user = session("wechat.oauth_user");
        dd($user->original);
   }


}