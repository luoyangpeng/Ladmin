<!DOCTYPE html>
<!--[if IE 8]> <html lang="zh-cn" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="zh-cn" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="zh-cn"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>{{$seo['title']}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="keywords" content="{{$seo['keywords']}} ">
    <meta content="{{$seo['desc']}}" name="description" />
    <meta content="itas" name="author" />
    <meta name="baidu-site-verification" content="hxaiwCrdBK" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="/front/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/front/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->


    <!-- BEGIN THEME STYLES -->

    <link href="/front/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/front/assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/front/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/front/assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    @yield('css')
    <link rel="shortcut icon" href="favicon.ico" />

</head>
<body>


<!-- BEGIN HEADER -->
<div class="header navbar navbar-default navbar-static-top">

    <div class="container">
        <div class="navbar-header">
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <button class="navbar-toggle btn navbar-btn" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN LOGO (you can use logo image instead of text)-->
            <a class="navbar-brand logo-v1" href="/">
                <img src="/front/assets/img/logo.png" id="logoimg" alt="" >
            </a>
            <!-- END LOGO -->
        </div>

        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown @if($url == '/')active @endif">
                    <a class="dropdown-toggle" href="/">首页 </a>

                </li>
                <li class="dropdown @if($url == '/blog')active @endif">
                    <a class="dropdown-toggle" href="{{url('blog/')}}">博客  </a>

                </li>
                 <li class="dropdown @if($url == '/program')active @endif">
                    <a class="dropdown-toggle" href="{{url('program/')}}">小应用 </a>

                </li>
                <li class="dropdown @if($url == '/live')active @endif">
                    <a class="dropdown-toggle" href="{{url('live/')}}">直播 </a>

                </li>
                <li class="dropdown ">

                    <a href="{{env('SSO_SERVER')}}login?oauth_callback=https://{{env('FRONT_DOMAIN')}}" id="loginLink"><i class="fa fa-user"></i><span id="account">登录</span></a>

                </li>
                
            </ul>
        </div>
        <!-- BEGIN TOP NAVIGATION MENU -->
    </div>
</div>
<!-- END HEADER -->

@yield('content')

<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 border-right">
                <!-- BEGIN ABOUT -->
                <h2>关于Ladmin</h2>
                <p class="margin-bottom-30">Ladmin是一个免费开源的管理系统。</p>
                <div class="clearfix"></div>
                <!-- END ABOUT -->


            </div>
            <div class="col-md-4 col-sm-4 border-right">
                <!-- BEGIN CONTACTS -->
                <h2>联系我们</h2>
                <address class="margin-bottom-40">
                    QQ群:517471676<br>
                </address>
                <!-- END CONTACTS -->

            </div>
            <div class="col-md-4 col-sm-4">
                <!-- BEGIN TWITTER BLOCK -->
                <h2>关注我们</h2>
                <dl class="dl-horizontal f-twitter">
                    <dt><i class="fa fa-weibo"></i></dt>
                    <dd>
                        <a href="http://weibo.com/hnlhlyp1122" target="_blank">新浪微博</a>

                    </dd>
                </dl>


                <!-- END TWITTER BLOCK -->
            </div>

        </div>
    </div>
</div>
<!-- END FOOTER -->

<!-- BEGIN COPYRIGHT -->
<div class="copyright">

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-sm-8">
                <p>
                    <span class="margin-right-10">2017 © iyoulang.cc 版权所有. </span>
                    <span>
                        Power by <a target="_blank" href="https://github.com/luoyangpeng/Ladmin">Ladmin</a>
                    </span>

                </p>
            </div>

        </div>
    </div>
</div>
<!-- END COPYRIGHT -->


<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="/front/assets/plugins/respond.min.js"></script>
<![endif]-->
<script src="/front/assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>

<script src="/front/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript" src="/front/assets/plugins/back-to-top.js"></script>
<!-- END CORE PLUGINS -->

@yield('js')
<script>
    var ticket = "{{$_COOKIE['ticket'] or ''}}";
     $.ajax({
            url: '{{env("SSO_SERVER")}}sso/user_info?ticket='+ticket,
            dataType: "jsonp",
            jsonp: "callback",
            success: function (data) {
                //var dataObj=eval("("+data+")");//转换为json对象 
                $("#account").text(data.username);
                $("#loginLink").attr('href','javascript:void()');
                console.log(data.username);
            },
            fail:function() {
                console.log('fail');
            }
    })
    </script>
</body>

</html>

