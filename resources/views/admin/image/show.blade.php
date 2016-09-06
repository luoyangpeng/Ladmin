@extends('layouts.admin')
@section('css')
    <link href="{{asset('backend/plugins/baidu-upload/css/webuploader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/plugins/baidu-upload/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/plugins/select2/select2.min.css')}}" rel="stylesheet" />
    <style>
        .select2-container .select2-selection--single {
            height: 38px !important;

        }
         .select2-selection--single .select2-selection__rendered {

            line-height: 38px !important;
        }

    </style>
@endsection
@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('admin/')}}">{!! trans('labels.breadcrumb.home') !!}</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{!! trans('labels.breadcrumb.imageUpload') !!}</span>
            </li>
        </ul>
    </div>
    <div class="form-group form-md-line-input form-horizontal">
        <label class="col-md-2 control-label" for="pid">广告类型</label>
        <div class="col-md-3">
            <select class="form-control" id="category_id" name="category_id">
                <option value="">选择图片类型</option>
                <option value="1">广告</option>
                <option value="2">文章图片</option>
                <option value="3">其他</option>

            </select>
            <div class="form-control-focus"> </div>
        </div>
    </div>
    <br>
    <div id="uploader" class="margin-top-40">
        <div class="queueList">
            <div id="dndArea" class="placeholder">
                <div id="filePicker"></div>
                <p>或将照片拖到这里，单次最多可选300张</p>
            </div>
        </div>
        <div class="statusBar" style="display:none;">
            <div class="progress">
                <span class="text">0%</span>
                <span class="percentage"></span>
            </div><div class="info"></div>
            <div class="btns">

                <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{asset('backend/plugins/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/plugins/baidu-upload/js/webuploader.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/plugins/baidu-upload/upload.js')}}"></script>
    <script src="{{asset('backend/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript">
        $('select').select2();
    </script>
@endsection