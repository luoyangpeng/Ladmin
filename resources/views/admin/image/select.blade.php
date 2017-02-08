@extends('layouts.admin')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('admin/')}}">{!! trans('labels.breadcrumb.home') !!}</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{!! trans('labels.breadcrumb.imageSelect') !!}</span>
            </li>
        </ul>
    </div>

    <div class="form-group">

        <img src="" />
        <input type="hidden" name="image">
    </div>

@endsection

@section('js')

    <script>
        /**
         * 弹出选择图片提示框
         */
        function showChoseImageDialog(obj, content){

            var _this = obj;

            layer.open({
                title:'选择图片',
                type: 2,//1：字符串；2:content填URL
                area: ['650px', '455px'],
                content: content ,//这里content是一个普通的String
                zIndex: layer.zIndex,
                btn: ['确认', '取消'],
                yes: function(layero, index){
                    var body = layer.getChildFrame('body', 0);
                    var size = body.find('.chose_icon').size();//选中数量
                    if(size <= 0){
                        layer.alert("请选择图片");
                        return;
                    }

                    //设置图片
                    var imagePath       = body.find(".chose_icon").attr("src");
                    // alert(imagePath);
                    //设置input值
                    $('.form-group').find('input[type=hidden]').val(imagePath);
                    //修改图片src属性
                    $('.form-group').find('img').attr('src', imagePath);
                    layer.closeAll()

                },
                cancel: function(layero, index){
                    layer.closeAll()
                }
            });
        }
        showChoseImageDialog("",'{{url("admin/image/lib")}}');
    </script>
@endsection