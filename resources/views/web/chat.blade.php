<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1,maximum-scale=1, user-scalable=no">
    <script src="/front/assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
    <title>聊天系统</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            max-width: 100%;
        }

        header {
            text-align: center;
            height: 50px;
            line-height: 50px;
            background: #18b4ed;
            color: #fff
        }
        footer{

            position:fixed;
            bottom:0;
            left:0;
            width:100%;
            background: #fff;
        }
        #chat-thread{
            overflow:auto;
            margin-bottom:60px;
        }
        #chat-thread ul {
            list-style: none;


        }

        #chat-thread li.rcv {
            animation: show-chat-even 0.15s 1 ease-in;
            -moz-animation: show-chat-even 0.15s 1 ease-in;
            -webkit-animation: show-chat-even 0.15s 1 ease-in;
            float: left;
            margin-left: 60px;
            margin-right: 60px;
            margin-top: 20px;
            color: #8dc63f;
        }

        #chat-thread li {
            min-height: 12px;
            position: relative;
            clear: both;
            display: inline-block;
            padding: 10px 20px 10px 20px;
            margin: 0 0 10px 0;
            font: 14px/18px 'Noto Sans', sans-serif;
            border-radius: 4px;
            background-color: rgba(25, 147, 147, 0.2);
            word-wrap: break-word;
            /*max-width: 80%;*/
        }

        .rcv_user {
            font-size: 12px;
            color: #B0BDB7;
            float: left;
        }

        #chat-thread li.rcv .rcv_img {
            position: absolute;
            top: 0;
            width: 40px;
            height: 40px;
            border-radius: 40px;
            left: -60px;
            background-image: url(http://www.malu.me/im/img/user.png);
            background-size: 40px;
            background-position: center;
            background-repeat: no-repeat;
        }

        #chat-thread li.rcv:after {
            border-left: 15px solid transparent;
            left: -15px;
        }

        #chat-thread li:after {
            position: absolute;
            top: 11px;
            content: '';
            width: 0;
            height: 0;
            border-top: 15px solid rgba(25, 147, 147, 0.2);
        }
        #chat-thread li.send {
            animation: show-chat-odd 0.15s 1 ease-in;
            -moz-animation: show-chat-odd 0.15s 1 ease-in;
            -webkit-animation: show-chat-odd 0.15s 1 ease-in;
            float: right;
            margin-right: 90px;
            margin-top: 20px;
            color: #3F9DC6;
        }
        #chat-thread li.send .my_img {
            position: absolute;
            top: 0;
            width: 40px;
            height: 40px;
            border-radius: 40px;
            right: -60px;
            background-image: url(http://www.malu.me/im/img/user.png);
            background-size: 40px;
            background-position: center;
            background-repeat: no-repeat;
        }
        #chat-thread li.send:after {
            border-right: 15px solid transparent;
            right: -15px;
        }
        .btn_face{padding:10px}
        .chat_toolbar{
            display: -webkit-box;
            height: 50px;
            line-height: 50px;
            background:#ebecee;
        }
        .chat_toolbar .btn_img {
            width: 30px;
            height: 30px;
            display:block;
        }
        .btn_face .btn_img {
            background: url(__PUBLIC__/static/wap/images/chat_bottombar_icon_face.png);
        }
        .btn_img {
            margin: 0 4px;
            background-size: 100% 100%!important;
        }
        .chat_input {
            display: block;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            padding: 5px 10px;

            resize: none;
            -webkit-box-flex: 1;
            -moz-box-flex: 1;
            box-flex: 1;
            margin: 7px 10px 5px 6px;
            height: 25px;
            max-height: 80px;
            overflow: hidden;
            border:none
        }
        .input_white, .icon_input_white {
            color: #333;
            background: #f9f9f9;

        }
        #send_chat_btn {
            width: 56px;
            margin: 5px 10px 5px 6px;
            padding: 10px 10px;
            border:none;

        }
        .btn_blue{
            background: #18b4ed;
            color:#fff;
            border-radius: 5px;
        }
        .face{
            padding:10px;
            padding-top:0;
            display:block;
        }
        .face li {
            float: left;
            list-style-type: none;
            padding: 2px;
        }
        .face .face_list img{
            width:50px;
            height:50px;
        }
        .nickname{
            line-height: 70px;
            width: 150px;
        }

    </style>
</head>
<body>
<header> 聊天系统(<span id="online"></span>) </header>
<div id="chat-thread" class="ps-container ps-active-y">
    <ul>
        <!--
                
                <li class="rcv">
                    <div class="rcv_img" style="background-image: url(http://www.malu.me/im/img/f-30.png)">
                        <p class="nickname">ice世界</p>
                    </div>
                    <div class="rcv_user">Ladmin:</div>你好呀
                </li>
                
                <li class="send">
                    <div class="my_img" style="background-image:url(http://www.malu.me/im/img/f-18.png)"></div>
                    How are you
                </li>
        -->
    
    </ul>
    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
        <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps-scrollbar-y-rail"
         style="top: 0px; right: 0px; height: 380px;">
        <div class="ps-scrollbar-y" style="top: 0px; height: 158px;"></div>
    </div>
</div>

<footer>
    <div class="chat_toolbar">
        <div id="add_face_btn" class=" btn_face">
            <span class="btn_img"></span>
        </div>

        <input id="chat_input" class="chat_input input_white" />
        <button id="send_chat_btn" class=" btn_blue" onclick="onSubmit();">
            <span class="btn_text" >发送</span>
        </button>
    </div>
    <div class="face" style="display:none">
        <ul>

        </ul>
    </div>
</footer>
<script src='http://cdn.bootcss.com/socket.io/1.3.7/socket.io.js'></script>
<script>
    // 连接服务端
    var socket = io('http://121.42.201.58:2120');
    // uid可以是自己网站的用户id，以便针对uid推送以及统计在线人数
    uid = '{{$user->id}}';
    nickname = '{{$user->nickname}}';
    var avatar = '{{$user->avatar}}';
    // socket连接后以uid登录
    socket.on('connect', function(){
        socket.emit('login', uid);
    });
    // 后端推送来消息时
    socket.on('new_msg', function(msg){
        var data = eval("("+msg+")");
        console.log("收到消息："+data.content);
        var html='<li class="rcv">'+
                    '<div class="rcv_img" style="background-image:url('+data.avatar+')">'+
                        '<p class="nickname">'+data.nickname+'</p>'+
                        '</div>'+data.content +
                 '</li>';
        if(data.nickname != nickname){
            $("#chat-thread ul").append(html);
            $("body").scrollTop($("body").height());
        }    
    });
    // 后端推送来在线数据时
    socket.on('update_online_count', function(online_stat){
        console.log(online_stat);
        $("#online").html(online_stat);
    });
</script>
<script type="text/javascript">
    // 提交对话
    var input
    function onSubmit() {

        var input = document.getElementById("chat_input");

        //input.focus();
        $(".face").hide();
        //显示自己发送的内容

        var content=input.value;

        //发送消息
        $.get("https://www.iyoulang.cc/push",{content:content,nickname:nickname,avatar:avatar},function(data){

        });

        var is_img = content.match("/\.jpg|\.png|\.bmp/|\.jpeg");
        if(is_img!=null){
            var html='<li class="send"><div class="my_img" style="background-image:url(http://www.malu.me/im/img/f-18.png)"></div><img src="'+input.value+'"</li>';
        }else{
            var html='<li class="send">'+
                    '<div class="my_img" style="background-image:url('+avatar+')">'+
                    '<p class="nickname">'+nickname+'</p>'+
                    '</div>'+input.value +'</li>';
        }
        $("#chat-thread ul").append(html);
        //
        input.value = "";
    }

</script>
</body>
</html>