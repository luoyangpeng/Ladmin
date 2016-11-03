<?php

namespace App\Http\Controllers;

class MessagePushController extends Controller {

    public function __construct()
    {
        $this->middleware("wechat.oauth2",['only'=>'chat']);
    }

    public function push()
    {
        // 指明给谁推送，为空表示向所有在线用户推送
        $to_uid = request('uid','');
        $content = request('content','');
        $nickname = request('nickname','');
        $avatar = request('avatar','http://www.malu.me/im/img/f-18.png');
        // 推送的url地址
        $push_api_url = config("message_push.message_push_url");
        $post_data = array(
            "type"     => "publish",
            "content"  => $content,
            'nickname' => $nickname,
            'avatar'   => $avatar,
            "to"       => $to_uid,
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $push_api_url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_data );
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Expect:"));
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        var_export($return);
    }


    public function chat()
    {
        $user = session("wechat.oauth_user");
        return view('web.chat',compact('user'));
    }
}
