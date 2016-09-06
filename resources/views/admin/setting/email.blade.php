@extends('layouts.admin')


@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('admin/')}}">{!! trans('labels.breadcrumb.home') !!}</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{!! trans('labels.breadcrumb.emailTemple') !!}</span>
            </li>
        </ul>
    </div>
    <div class="margin-top-40 col-md-6">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab_0" data-toggle="tab"> 标题 </a>
            </li>
            <li>
                <a href="#tab_1" data-toggle="tab"> 内容 </a>
            </li>
            <li>
                <a href="#tab_2" data-toggle="tab"> 底部 </a>
            </li>

        </ul>
        <div class="wx_content">
            <div class="tag-item" title="标题102">
                <section class="wx96Diy" data-source="bj.96weixin.com">
                    <section class="96wxDiy" style="clear: both; position: relative; width: 100%; margin: 0px auto; overflow: hidden;"><section style="padding-left: 15px; position: static; box-sizing: border-box;"><section style="display: inline-block; vertical-align: top; width: 95%; box-sizing: border-box;"><section class="96wx-bgc 96wx-bdc" style="display: inline-block; float: left; width: 1em; height: 1em; margin-top: 1.5em; margin-bottom: -2em; margin-left: -0.5em; border: 1px solid rgb(155, 187, 89); border-top-left-radius: 100%; border-top-right-radius: 100%; border-bottom-right-radius: 100%; border-bottom-left-radius: 100%; box-sizing: border-box; background-color: rgb(155, 187, 89);"></section><section class="96wx-bdbc" style="border-left-width: 1px; border-left-style: solid; border-color: rgb(223, 25, 81) rgb(155, 187, 89) rgb(155, 187, 89); height: 1.2em; box-sizing: border-box;"></section><section class="96wx-bdlc" style="border-left-width: 1px; border-left-style: solid; border-color: rgb(155, 187, 89) rgb(155, 187, 89) rgb(179, 18, 63) rgb(155, 187, 89); margin-top: -1.2em; box-sizing: border-box;"><section class="96wx-bdrc" style="width: 0px; margin-left: 5px; border-right-width: 10px; border-right-style: solid; border-right-color: rgb(155, 187, 89); display: inline-block; margin-top: 1.7em; vertical-align: top; box-sizing: border-box; border-top-width: 6px !important; border-top-style: solid !important; border-top-color: transparent !important; border-bottom-width: 6px !important; border-bottom-style: solid !important; border-bottom-color: transparent !important;"></section><section class="96wx-bgc" style="display: inline-block; vertical-align: middle; width: 90%; padding: 8px; margin: 0.5em auto; border-radius: 0.5em; box-sizing: border-box; background-color: rgb(155, 187, 89);"><p style="box-sizing: border-box;">输入文字</p></section></section></section></section></section>
                </section>
            </div>
            <div class="tag-item" title="标题98">
                <section class="wx96Diy" data-source="bj.96weixin.com">
                    <section class="96wxDiy" style="display:block;clear:both;position:relative;width:100%;margin:0 auto;overflow:hidden;">
                        <section style=" margin-top: 0.5em; margin-bottom: 0.5em; font-size: 1em; font-family: inherit; text-align: center; text-decoration: inherit; ">
                            <section style="width: 100%; margin-bottom: -1.85em;">
                                <section class="96wx-bgc" style="width: 100%; height: 0.3em; margin-top: 0.3em; background-color: rgb(9, 185, 34);"></section>
                                <section class="96wx-bgc" style="width: 100%; height: 0.3em; margin-top: 0.3em; background-color: rgb(9, 185, 34);"></section>
                                <section class="96wx-bgc" style="width: 100%; height: 0.3em; margin-top: 0.3em; background-color: rgb(9, 185, 34);"></section>
                            </section>
                            <section class="96wx-bgc" style="display: inline-block; vertical-align: bottom; line-height: 2.3em; padding-right: 15px; padding-left: 15px; background-color: rgb(9, 185, 34); min-height: 2.3em !important;">
                                <p style="color: rgb(255,255,255);font-size: 16px;-webkit-margin-before: 0em;  -webkit-margin-after: 0em;">
                                    请输入标题
                                </p>
                            </section>
                        </section>
                    </section>

                </section>
            </div>
            <div class="tag-item" title="正文84">
                <section class="wx96Diy" data-source="bj.96weixin.com">
                    <section class="96wxDiy" style="clear: both; position: relative; width: 100%; margin: 0px auto; overflow: hidden;"><section style="margin: 0.5em 0px;text-align: right"><section style="border-bottom-right-radius: 45px; border-top-left-radius: 45px; padding: 0px; box-sizing: border-box; width: 100%; background-color: rgb(227, 227, 227); border-top-color: rgb(179, 18, 86); border-left-color: rgb(24, 48, 223);"><section style="text-align: left;padding: 20px 30px;width: 100%;box-sizing: border-box;display: inline-block;"><p style="font-size: 16px;  color: rgb(3, 0, 0); font-weight: bold;">一个人的事</p><section class="96wx-bdbc" style="width: 98%; border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: rgb(0, 176, 80); padding: 5px; border-top-color: rgb(5, 7, 221);"></section><section style="padding: 10px 0px;"><p style="color: rgb(3, 0, 0);">可以一个人唱歌，一个人喝咖啡，一个人涂鸦，一个人旅行，一个人逛大街，一个人在雨中漫步，一个人听音乐，一个人自言自语，一个人发呆，一个人跳舞，一个人看电视，一个人翻杂志……只有爱，是自己一个人做不到的。</p></section></section></section></section></section>
                </section>
            </div>


        </div>
    </div>

    <div class="margin-top-40 col-md-6">


        {!! UEditor::css() !!}
        {!! UEditor::content() !!}
        {!! UEditor::js() !!}

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
                area: ['650px', '450px'],
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
                    var html = '<img  style="max-height:500px;max-width:500px" src="'+imagePath+'"/>';
                    ue.execCommand("insertHtml",html);
                    layer.closeAll()

                },
                cancel: function(layero, index){
                    layer.closeAll()
                }
            });
        }

    </script>
    <script type="text/javascript">

        var ue = UE.getEditor('ueditor',{initialFrameHeight:400,autoHeightEnabled: false}); //用辅助方法生成的话默认id是ueditor



        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
            $(".wx_content .tag-item").click(function(){
                var content = $(this).html();
                ue.execCommand("insertHtml",content+"<br>");
            });

        });

        UE.registerUI('选择图片', function(editor, uiName) {
            //注册按钮执行时的command命令，使用命令默认就会带有回退操作
            editor.registerCommand(uiName, {
                execCommand: function() {
                    alert('execCommand:' + uiName)
                }
            });
            //创建一个button
            var btn = new UE.ui.Button({
                //按钮的名字
                name: uiName,
                //提示
                title: uiName,
                //添加额外样式，指定icon图标，这里默认使用一个重复的icon
                cssRules: 'background-position: -726px -77px;',
                //点击时执行的命令
                onclick: function() {

                    showChoseImageDialog("","{{url('admin/image/lib')}}");
                }
            });
            //当点到编辑内容上时，按钮要做的状态反射
            editor.addListener('selectionchange', function() {
                var state = editor.queryCommandState(uiName);
                if (state == -1) {
                    btn.setDisabled(true);
                    btn.setChecked(false);
                } else {
                    btn.setDisabled(false);
                    btn.setChecked(state);
                }
            });
            //因为你是添加button,所以需要返回这个button
            return btn;
        });
    </script>
@endsection



