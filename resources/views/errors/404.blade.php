<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>404</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="{{asset('backend/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('backend/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset('backend/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />

        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{asset('backend/css/error.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" page-404-3">
        <div class="page-inner">
            <img src="{{asset('backend/img/earth.jpg')}}" class="img-responsive" alt=""> </div>
        <div class="container error-404">
            <h1>404！</h1>
            <h2>你要访问的页面以逃离地球，么么哒。</h2>
            <p> 实际上，你正在寻找的页面不存在。 </p>
            <p>
                <a href="{{url('admin')}}" class="btn red btn-outline"> 返回首页 </a>
                <br> </p>
        </div>


    </body>

</html>