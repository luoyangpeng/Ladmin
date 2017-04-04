<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Ladmin</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="_token" content="{{ csrf_token() }}"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{asset('backend/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        @yield('css')
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset('backend/css/components-md.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('backend/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/css/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <!-- END THEME LAYOUT STYLES -->
        <!-- <link rel="shortcut icon" href="favicon.ico" /> -->
        </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{url('admin')}}">
                        <img src="{{asset('backend/img/logo.png')}}" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="{{asset('backend/img/avatar3_small.jpg')}}" />
                                <span class="username username-hide-on-mobile"> {{Auth::user()->name}}</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{url('admin/user/profile')}}/{{Auth::user()->id}}">
                                        <i class="icon-user"></i> {{trans('labels.profile')}} </a>
                                </li>

                                <li class="divider"> </li>
                                <li>
                                    <a href="{{url('admin/lock')}}">
                                        <i class="icon-lock"></i> {{trans('labels.lock')}} </a>
                                </li>
                                <li>
                                    <a href="{{url('logout')}}">
                                        <i class="icon-key"></i> {{trans('labels.logout')}} </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            @include('layouts.sidebar')
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    @yield('content')
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 
                2016 © Iadmin.
                <span id="online"></span>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!--[if lt IE 9]>
        <script src="../assets/global/plugins/respond.min.js"></script>
        <script src="../assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('backend/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE JQUERY PLUGINS -->
        <!-- layer-->
        <script type="text/javascript" src="{{asset('backend/plugins/layer/layer.js')}}"></script>
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        @yield('js')
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{asset('backend/js/app.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/js/layout.min.js')}}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->


        <script src='https://cdn.bootcss.com/socket.io/1.3.7/socket.io.js'></script>
        
        <script>
            var message_pull_url = "{{$message_pull_url or ''}}";
            if(message_pull_url != '') {
                // 连接服务端
                var socket = io('http://121.42.201.58:2120');
                // uid可以是自己网站的用户id，以便针对uid推送以及统计在线人数
                uid = {{auth()->user()->id}};
                // socket连接后以uid登录
                socket.on('connect', function(){
                    socket.emit('login', uid);
                }); 
                // 后端推送来消息时
                socket.on('new_msg', function(msg){
                    if(msg == 'other_place_logined'){
                        layer.alert('账号在其他地点登录,你已被迫下线');
                        location.href="{{url('logout')}}";
                    }
                    var data = eval("("+msg+")");
                    console.log("收到消息："+data.content);
                });
                // 后端推送来在线数据时
                socket.on('update_online_count', function(online_stat){
                    console.log(online_stat);
                    $("#online").html(online_stat);
                });
            }
            
           
        </script>
        
    </body>

</html>