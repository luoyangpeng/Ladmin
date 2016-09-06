@extends('layouts.admin')
@section('content')
<div class="page-bar">
	<ul class="page-breadcrumb">
	    <li>
	        <a href="{{url('admin')}}">{!! trans('labels.breadcrumb.home') !!}</a>
	        <i class="fa fa-angle-right"></i>
	    </li>
	    <li>
	        <a href="{{url('admin/article')}}">{!! trans('labels.breadcrumb.articleList') !!}</a>
	        <i class="fa fa-angle-right"></i>
	    </li>
	    <li>
	        <span>{!! trans('labels.breadcrumb.articleEdit') !!}</span>
	    </li>
	</ul>
</div>
<div class="row margin-top-40">
  <div class="col-md-12">
      <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet light bordered">
          <div class="portlet-title">
              <div class="caption font-green-haze">
                  <span class="caption-subject bold uppercase">{!! trans('labels.breadcrumb.articleEdit') !!}</span>
              </div>
              <div class="actions">
                  <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
              </div>
          </div>
          <div class="portlet-body form">
          		@if (isset($errors) && count($errors) > 0 )
					    <div class="alert alert-danger">
					        <button class="close" data-close="alert"></button>
					        @foreach($errors->all() as $error)
					            <span class="help-block"><strong>{{ $error }}</strong></span>
					        @endforeach
					    </div>
					    @endif
              @include('flash::message')
              <form role="form" class="form-horizontal" method="POST" action="/admin/article/{{$article['id']}}">
              		{!! csrf_field() !!}
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="id" value="{{$article['id']}}">
                  <div class="form-body">
                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="title">{{trans('labels.article.title')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="title" name="title" placeholder="{{trans('labels.article.title')}}" value="{{$article['title']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="desc">{{trans('labels.article.desc')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="desc" name="desc" placeholder="{{trans('labels.article.desc')}}" value="{{$article['desc']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="author">{{trans('labels.article.author')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="author" name="author" placeholder="{{trans('labels.article.author')}}" value="{{$article['author']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="from">{{trans('labels.article.from')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="from" name="from" placeholder="{{trans('labels.article.from')}}" value="{{$article['from']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="content">{{trans('labels.article.content')}}</label>
                          <div class="col-md-8">
                              {!! UEditor::css() !!}
                              {!! UEditor::content() !!}
                              {!! UEditor::js() !!}
                          </div>

                      </div>


                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.role.status')}}</label>
                        <div class="col-md-10">
                            <div class="md-radio-inline">
                                <div class="md-radio">
                                    <input type="radio" id="status1" name="status" value="{{config('admin.global.status.active')}}" class="md-radiobtn" @if($article['status'] == config('admin.global.status.active')) checked @endif>
                                    <label for="status1">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.role.active.1')}} </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="status2" name="status" value="{{config('admin.global.status.audit')}}" class="md-radiobtn" @if($article['status'] === config('admin.global.status.audit')) checked @endif>
                                    <label for="status2">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.role.audit.1')}} </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="status3" name="status" value="{{config('admin.global.status.trash')}}" class="md-radiobtn" @if($article['status'] == config('admin.global.status.trash')) checked @endif>
                                    <label for="status3">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.role.trash.1')}} </label>
                                </div>
                            </div>
                        </div>
                      </div>

                  </div>
                  <div class="hide">
                      <textarea id="article_content">
                          {{$article['content']}}
                      </textarea>
                  </div>
                  <div class="form-actions">
                      <div class="row">
                          <div class="col-md-offset-2 col-md-10">
                              <a href="/admin/article" class="btn default">{{trans('crud.cancel')}}</a>
                              <button type="submit" class="btn blue">{{trans('crud.submit')}}</button>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection




@section('js')
    <script>
        /**
         * 弹出选择图片提示框
         */
        function showChoseImageDialog( content ){


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
    <script>
        var ue = UE.getEditor('ueditor',{initialFrameHeight:400,autoHeightEnabled: false}); //用辅助方法生成的话默认id是ueditor

        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');

            var article_content = $("#article_content").val();
            ue.execCommand("insertHtml",article_content);

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

                    showChoseImageDialog("{{url('admin/image/lib')}}");
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