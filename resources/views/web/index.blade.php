@extends('web.layout.web')

@section('css')

@endsection

@section('content')
 <!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
    <!-- BEGIN REVOLUTION SLIDER -->
    <div class="fullwidthbanner-container slider-main banner_bg">
        <div class="banner_content">

            <h1 class="banner_title">
                <span>EasyLms管理系统V2.0</span>
            </h1>
            <div id="banner-start">
                <span id="banner-start-command">https://github.com/luoyangpeng/Ladmin</span>
                <a id="banner-start-link" target="_blank" href="https://github.com/luoyangpeng/Ladmin"><i class="fa fa-arrow-right"></i></a>
            </div>
        </div>

    </div>
    <!-- END REVOLUTION SLIDER -->

    <!-- BEGIN CONTAINER -->
    <div class="container">

        <!-- BEGIN SERVICE BLOCKS -->
        <div class="">
            <div class="row margin-bottom-20">
                <div class="col-md-3 service-box-v1">
                    <div><i class="fa fa-thumbs-up color-grey"></i></div>
                    <h2>优美的代码和框架</h2>
                    <p>Beautiful code and framework.</p>
                </div>
                <div class="col-md-3 service-box-v1">
                    <div><i class="fa fa-cloud-download color-grey"></i></div>
                    <h2>使用漂亮的模板</h2>
                    <p>Use beautiful templates.</p>
                </div>
                <div class="col-md-3 service-box-v1">
                    <div><i class="fa fa-dropbox color-grey"></i></div>
                    <h2>多平台支持</h2>
                    <p>Multi-platform support.</p>
                </div>
                <div class="col-md-3 service-box-v1">
                    <div><i class="fa fa-globe color-grey"></i></div>
                    <h2>功能丰富</h2>
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
