<?php

namespace App\Http\Controllers;

class WechatController extends Controller
{

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
}