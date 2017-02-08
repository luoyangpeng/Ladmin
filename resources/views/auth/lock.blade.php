<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>LAdmin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{asset('backend/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('backend/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('backend/css/components-md.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->

    <!-- <link rel="shortcut icon" href="favicon.ico" /> -->
    <link href="{{asset('backend/css/lock.css')}}" rel="stylesheet" type="text/css" />
    @yield('css')
</head>
<!-- END HEAD -->

<body>

    <div class="page-lock">
        <div class="page-logo">
            <a class="brand" href="index.html">
                <img src="{{asset('backend/img/logo.png')}}" alt="logo" /> </a>
        </div>
        <div class="page-body">
            <div class="lock-head"> 锁屏 </div>
            <div class="lock-body">
                <div class="pull-left lock-avatar-block">
                    <img src="{{asset('backend/img/avatar3_small.jpg')}}" class="lock-avatar"> </div>
                <form class="lock-form pull-left" action="{{url('admin/unlock')}}" method="post">
                    {{!!csrf_field()!!}}
                    <h4>{{$name}}</h4>
                    <div class="form-group">
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                    <div class="form-actions">
                        <button type="submit" class="btn red uppercase">Login</button>
                    </div>
                </form>
            </div>
            <div class="lock-bottom">
                <a href="{{ url('/password/reset') }}">忘记密码?</a>
            </div>
        </div>
        <div class="page-footer-custom"> 2017 &copy;  Ladmin  </div>
    </div>
</body>


<script src="{{asset('backend/js/lock.min.js') }}" type="text/javascript"></script>

</html>
