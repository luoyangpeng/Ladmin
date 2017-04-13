<html><head>
    <title>单点登录</title>
    <meta charset="utf-8">
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="{{asset('/front/assets/plugins/jquery-1.10.2.min.js')}}"></script>
    <style>
        body {
            color: #fff;
            font-size: 12px;
            font-family: "arial","微软雅黑";
            background: #f0f1f1;
        }
        #loginalert {
            width: 440px;
            background-color: rgba(255,255,255,.2);
            position: fixed;
            top: 200px;
            left: 50%;
            margin-left: -220px;
            z-index: 99;
        }
        .loginpd {
            border-bottom: 1px solid #ecf2f5;
        }
        .pd20 {
            padding: 0px;
        }
        .closealert {
            width: 20px;
            height: 20px;
            cursor: pointer;
            background: url('icons.png') no-repeat -220px -315px;
            -webkit-transition: all 0.4s ease-out;
            -moz-transition: all 0.4s ease-out;
            -o-transition: all 0.4s ease-out;
            transition: all 0.4s ease-out;
        }
        .fr {
            float: right;
        }
        .clear {
            clear: both;
        }
        .loginwrap {
            width: 340px;
            margin: 0 auto;
        }
        .loginh {
            height: 40px;
            margin-top: 20px;
        }
        .loginh .fl {
            font-size: 30px;
            line-height: 40px;

        }
        .fl {
            float: left;
        }
        .loginh .fr {
            font-size: 18px;
            line-height: 50px;

        }
        .loginh .fr a {
            font-size: 18px;
            line-height: 50px;
            color: #FF4200;
            margin-left: 5px;
        }
        .loginwrap h3 {
            font-size: 14px;
            font-weight: 500;
            height: 20px;
            margin-top: 15px;
            color: #292929;
        }
        .loginwrap h3 span {
            font-size: 14px;
            font-weight: 500;
            height: 26px;
            color: #292929;
            display: block;
            float: left;
            line-height: 26px;
        }
        .loginwrap .login_warning {
            display: block;
            height: 20px;
            line-height: 20px;
            background: #ff7200;
            color: #fff;
            padding: 0 4px;
            float: left;
            text-align: center;
            font-size: 12px;
            margin-left: 14px;
            margin-top: 3px;
            display: none;
        }
        .loginwrap h3 span {
            font-size: 14px;
            font-weight: 500;
            height: 26px;
            color: #292929;
            display: block;
            float: left;
            line-height: 26px;
        }
        .logininput .loginusername {
            margin-top: 15px;
            margin-bottom: 10px;
        }
        .logininput input {
            -webkit-transition: all 0.2s ease-in;
            -moz-transition: all 0.2s ease-in;
            -o-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
        }
        .loginsubmit input {
            width: 130px;
            height: 40px;
            line-height: 40px;
            color: #fff;
            background: #70CA10;
            display: block;
            text-align: center;
            font-size: 20px;
            border: none;
            font-family: '微软雅黑';
            cursor: pointer;
        }
        .logininput input {
            display: block;
            line-height: 14px;
            width: 100%;
            border: #DAE2E5 1px solid;
            text-indent: 10px;
            overflow: hidden;
            color: #979696;
            padding-top: 13px;
            padding-bottom: 13px;
        }
        .loginbtn {
            line-height: 70px;
            color: #6B6A6A;
        }
        .loginsubmit {
            width: 130px;
            height: 40px;
            margin: 15px 20px 0 0;
            position: relative;
        }

        .thirdlogin .pd50 {
            padding-top: 0px;
            padding-bottom: 10px;
        }
        .pd50 {
            padding: 50px;
        }

        .thirdlogin h4 {
            font-weight: 500;
            margin-bottom: 20px;
        }
        .thirdlogin ul li {
            margin-right: 20px;
        }
        .thirdlogin ul li {
            display: block;
            float: left;
            margin-bottom: 10px;
        }
        #sinal a {
            background: #d63b22 url('/front/assets/img/weibo.png') no-repeat 0px -5px;
        }
        #qql a {
            background: #3eb0d8 url('/front/assets/img/qq.png') no-repeat 0px -5px;
        }
        .thirdlogin ul li a {
            display: block;
            float: left;
            height: 40px;
            line-height: 40px;
            width: 160px;
            color: #fff;
            text-indent: 60px;
        }
        dl, dt, dd, ul, li {
            margin: 0;
            padding: 0;
        }
        ol, ul, li {
            list-style: none;
        }
        a {
            text-decoration: none;
            color: #fff;
            font-size: 12px;
            font-family: "arial","微软雅黑";
        }
    </style>
    <script>
        /*
         11     ① 用setInterval(draw, 33)设定刷新间隔
         12
         13     ② 用String.fromCharCode(1e2+Math.random()*33)随机生成字母
         14
         15     ③ 用ctx.fillStyle=’rgba(0,0,0,.05)’; ctx.fillRect(0,0,width,height); ctx.fillStyle=’#0F0′; 反复生成opacity为0.5的半透明黑色背景
         16
         17     ④ 用x = (index * 10)+10;和yPositions[index] = y + 10;顺序确定显示字母的位置
         18
         19     ⑤ 用fillText(text, x, y); 在指定位置显示一个字母 以上步骤循环进行，就会产生《黑客帝国》的片头效果。
         20 */
        $(document).ready(function() {
            //设备宽度
            var s = window.screen;
            var width = q.width = s.width;
            var height = q.height;
            var yPositions = Array(300).join(0).split('');
            var ctx = q.getContext('2d');

            var draw = function() {
                ctx.fillStyle = 'rgba(0,0,0,.05)';
                ctx.fillRect(0, 0, width, height);
                ctx.fillStyle = 'green';/*代码颜色*/
                ctx.font = '10pt Georgia';
                yPositions.map(function(y, index) {
                    text = String.fromCharCode(1e2 + Math.random() * 330);
                    x = (index * 10) + 10;
                    q.getContext('2d').fillText(text, x, y);
                    if (y > Math.random() * 1e4) {
                        yPositions[index] = 0;
                    } else {
                        yPositions[index] = y + 10;
                    }
                });
            };
            RunMatrix();
            function RunMatrix() {
                Game_Interval = setInterval(draw,30);
            }
        });
    </script>
</head>
<body>
<div align="center" style=" position:fixed; left:0; top:0px; width:100%; height:100%;">
    <canvas id="q" height="1300"></canvas>
</div>

<div id="loginalert" >
    <div class="pd20 loginpd">
        <h3><i class="closealert fr" style=""></i>
            <div class="clear"></div>
        </h3>
        <div class="loginwrap">
            @if (isset($errors) && count($errors) > 0 )
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <span class="help-block"><strong>{{ $error }}</strong></span>
                    @endforeach
                </div>
            @endif
            <div class="loginh">
                <div class="fl">会员登录</div>
                <div class="fr">还没有账号<a id="sigup_now" href="{{env('SSO_SERVER')}}register" >立即注册</a></div>
                <div class="clear"></div>
            </div>
            <h3>
                <span class="login_warning">用户名或密码错误</span>
                <div class="clear"></div>
            </h3>
            <div class="clear"></div>
            <form action="" method="post" id="login_form">
                {!! csrf_field() !!}
                <div class="logininput">
                    <input type="text" name="username" class="loginusername" placeholder="邮箱/用户名" onblur="$('#email').val(this.value)">
                    <input type="hidden" name="email" id="email" value="">
                    <input type="password" name="password" class="loginuserpasswordt" placeholder="密码">

                </div>
                <div class="loginbtn">
                    <div class="loginsubmit fl">
                        <input type="submit" value="登录">
                        <div class="loginsubmiting">
                            <div class="loginsubmiting_inner"></div>
                        </div>
                    </div>
                    <div class="fr"><a href="/">忘记密码?</a></div>
                    <div class="clear"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="thirdlogin">
        <div class="pd50">
            <h4>用第三方帐号直接登录</h4>
            <ul>
                <li id="sinal"><a href="javascript:;">微博账号登录</a></li>
                <li id="qql" style="margin-right: 0px;"><a href="javascript:;">QQ账号登录</a></li>
                <div class="clear"></div>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>