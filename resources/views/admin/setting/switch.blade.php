@extends('layouts.admin')


@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('admin/')}}">{!! trans('labels.breadcrumb.home') !!}</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{!! trans('labels.breadcrumb.functionSwitch') !!}</span>
            </li>
        </ul>
    </div>
<div class="margin-top-40">

    <div class="col-md-2 col-sm-2 col-xs-6">
        <div class="color-demo tooltips" data-original-title="点击开启或关闭后台验证码" data-toggle="modal" >
            <div class="color-view bg-green bg-font-green bold uppercase"> 后台验证码: </div>
            <div class="color-info bg-white c-font-14 sbold">
                <input type="checkbox"  name="f-captcha" class="make-switch" @if (env('ADMIN_CODE')) checked @endif data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-6">
        <div class="color-demo tooltips" data-original-title="点击开启或关闭前台验证码" data-toggle="modal" >
            <div class="color-view bg-green bg-font-green bold uppercase"> 前台验证码: </div>
            <div class="color-info bg-white c-font-14 sbold">
                <input  type="checkbox" name="a-captcha" class="make-switch" @if (env('FRONT_CODE')) checked @endif data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
            </div>
        </div>
    </div>

</div>

@endsection


@section('js')
    <script>

    $(function(){
        //var is = $("#captcha1").is(':checked')
        $(".color-info").click(function(){

           var is_checked = $(this).find(".make-switch").is(':checked')

        });
    });
    </script>
@endsection



