@extends('web.layout.web')

@section('css')

@endsection

@section('content')
 <!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
    <!-- BEGIN REVOLUTION SLIDER -->
    <div class="fullwidthbanner-container slider-main banner_bg">
        <h1 class="banner_title">
            <span>最好用的Laravel后台管理系统</span>
        </h1>
    </div>
    <!-- END REVOLUTION SLIDER -->

    <!-- BEGIN CONTAINER -->
    <div class="container">

        <!-- BEGIN SERVICE BLOCKS -->
        <div class="">
            <div class="row margin-bottom-20">
                <div class="col-md-4 service-box-v1">
                    <div><i class="fa fa-thumbs-up color-grey"></i></div>
                    <h2>优美的代码和框架</h2>
                    <p>Beautiful code and framework.</p>
                </div>
                <div class="col-md-4 service-box-v1">
                    <div><i class="fa fa-cloud-download color-grey"></i></div>
                    <h2>使用漂亮的模板</h2>
                    <p>Use beautiful templates.</p>
                </div>
                <div class="col-md-4 service-box-v1">
                    <div><i class="fa fa-dropbox color-grey"></i></div>
                    <h2>多平台支持</h2>
                    <p>Multi-platform support.</p>
                </div>
            </div>
            <div class="row margin-bottom-20">

                <div class="col-md-4 service-box-v1">
                    <div><i class="fa fa-gift color-grey"></i></div>
                    <h2>高扩展</h2>
                    <p>High scalability.</p>
                </div>
                <div class="col-md-4 service-box-v1">
                    <div><i class="fa fa-comments color-grey"></i></div>
                    <h2>易使用</h2>
                    <p>Easy to use.</p>
                </div>
                <div class="col-md-4 service-box-v1">
                    <div><i class="fa fa-globe color-grey"></i></div>
                    <h2>完整文档</h2>
                    <p>Complete documentation.</p>
                </div>
            </div>

        </div>
        <!-- END SERVICE BLOCKS -->

        <div class="clearfix"></div>

    </div>
    <!-- END CONTAINER -->
</div>
<!-- END PAGE CONTAINER -->
@endsection


 @section('js')
    <script src="/front/assets/scripts/app.js"></script>
    <script src="/front/assets/scripts/index.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();

        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
@endsection
