@extends('web.layout.web')

@section('css')

@endsection

@section('content')
 <!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
   

    <!-- BEGIN CONTAINER -->
    <div class="container" style="height: 500px;margin-top: 100px">

        <!-- BEGIN SERVICE BLOCKS -->
        <div class="">
            <div class="row margin-bottom-20">
                <a href="{{asset('/reward')}}">
                    <div class="col-md-3 service-box-v1">
                        <div><i class="fa fa-money color-grey"></i></div>
                        <h2>微信打赏</h2>
                        <p style="color: red">仅供测试使用,请勿支付！！！</p>
                    </div>
                </a>
                <a href="{{asset('/chat')}}">
                    <div class="col-md-3 service-box-v1">
                        <div><i class="fa fa-globe color-grey"></i></div>
                        <h2>多人在线聊天</h2>
                        <p style="color: red">公众号别人的，注意功能就对啦！</p>
                    </div>
                </a>

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
