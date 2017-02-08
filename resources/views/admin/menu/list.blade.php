@extends('layouts.admin')
@section('css')
<link href="{{asset('backend/plugins/jquery-nestable/jquery.nestable.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .dd-item > button {
            margin: 7px 20px !important;
            left: 10px !important;
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
          <span>{!! trans('labels.breadcrumb.menuList') !!}</span>
      </li>
  </ul>
</div>
<div class="row margin-top-40">
    <div class="col-md-12">
      @include('flash::message')
        <div class="col-md-6">
          <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
              <div class="caption">
                
                <span class="caption-subject font-green-sharp sbold uppercase">{!! trans('labels.breadcrumb.menuList') !!}</span>
              </div>
              <div class="actions">
                  <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
              </div>
            </div>
              <div class="portlet-body">
                  <div class="dd" id="nestable_list">
                      <ol class="dd-list">
                          @if($menus)
                          @foreach($menus as $v)
                          @if($v['child'])
                          <li class="dd-item " data-id="{{$v['id']}}" data-pid="{{$v['pid']}}">
                            <div class="dd-handle dd3-handle"></div>
                              <div class="dd3-content">
                                {{$v['name']}}
                                <div class="pull-right action-buttons">
                                @permission(config('admin.permissions.menu.create'))
                                <a href="javascript:;" data-pid="{{$v['id']}}" class="btn-xs tooltips createMenu" data-original-title="{{trans('crud.create')}}"  data-placement="top"><i class="fa fa-plus"></i></a>
                                @endpermission
                                @permission(config('admin.permissions.menu.edit'))
                                <a href="javascript:;" data-href="{{url('admin/menu/'.$v['id'].'/edit')}}" class="btn-xs tooltips editMenu" data-original-title="{{trans('crud.edit')}}"  data-placement="top"><i class="fa fa-pencil"></i></a>
                                @endpermission
                                @permission(config('admin.permissions.menu.destory'))
                                <a href="javascript:;" data-id="{{$v['id']}}" class="btn-xs tooltips destoryMenu" data-original-title="{{trans('crud.destory')}}"  data-placement="top"><i class="fa fa-trash"></i><form action="{{url('admin/menu/'.$v['id'])}}" method="POST" name="delete_item{{$v['id']}}" style="display:none"><input type="hidden" name="_method" value="delete"><input type="hidden" name="_token" value="{{csrf_token()}}"></form></a>
                                @endpermission
                                </div>
                              </div>
                              <ol class="dd-list">
                                  @foreach($v['child'] as $val)
                                  <li class="dd-item" data-id="{{$val['id']}}" data-pid="{{$val['pid']}}">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">
                                      {{$val['name']}}
                                      <div class="pull-right action-buttons">
                                      @permission(config('admin.permissions.menu.edit'))
                                      <a href="javascript:;" data-href="{{url('admin/menu/'.$val['id'].'/edit')}}" class="btn-xs tooltips editMenu" data-original-title="{{trans('crud.edit')}}"  data-placement="top"><i class="fa fa-pencil"></i></a>
                                      @endpermission
                                      @permission(config('admin.permissions.menu.destory'))
                                      <a href="javascript:;" data-id="{{$val['id']}}" class="btn-xs tooltips destoryMenu" data-original-title="{{trans('crud.destory')}}"  data-placement="top"><i class="fa fa-trash"></i><form action="{{url('admin/menu/'.$val['id'])}}" method="POST" name="delete_item{{$val['id']}}" style="display:none"><input type="hidden" name="_method" value="delete"><input type="hidden" name="_token" value="{{csrf_token()}}"></form></a>
                                      @endpermission
                                      </div>
                                    </div>
                                  </li>
                                  @endforeach
                              </ol>
                          </li>
                          @else
                              <li class="dd-item" data-id="{{$v['id']}}" data-pid="{{$v['pid']}}">
                                  <div class="dd-handle dd3-handle"></div>
                                  <div class="dd3-content"> 
                                    {{$v['name']}} 
                                    <div class="pull-right action-buttons">
                                    @permission(config('admin.permissions.menu.create'))
                                    <a href="javascript:;" data-pid="{{$v['id']}}" class="btn-xs tooltips createMenu" data-original-title="{{trans('crud.create')}}"  data-placement="top"><i class="fa fa-plus"></i></a>
                                    @endpermission
                                    @permission(config('admin.permissions.menu.edit'))
                                    <a href="javascript:;" data-href="{{url('admin/menu/'.$v['id'].'/edit')}}" class="btn-xs tooltips editMenu" data-original-title="{{trans('crud.edit')}}"  data-placement="top"><i class="fa fa-pencil"></i></a>
                                    @endpermission
                                    @permission(config('admin.permissions.menu.destory'))
                                    <a href="javascript:;" data-id="{{$v['id']}}" class="btn-xs tooltips destoryMenu" data-original-title="{{trans('crud.destory')}}"  data-placement="top"><i class="fa fa-trash"></i><form action="{{url('admin/menu/'.$v['id'])}}" method="POST" name="delete_item{{$v['id']}}" style="display:none"><input type="hidden" name="_method" value="delete"><input type="hidden" name="_token" value="{{csrf_token()}}"></form></a>
                                    @endpermission
                                    </div>
                                </div>
                              </li>
                          @endif
                          @endforeach
                          @endif
                      </ol>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="portlet  portlet-fit bordered" id="portlet_menu">
            <div class="portlet-title">
              <div class="caption">
              
                <span class="caption-subject font-green-sharp sbold uppercase">{!! trans('labels.menu.detail') !!}</span>
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
                <form role="form" class="form-horizontal" id="menuForm" method="POST" action="{{url('admin/menu')}}">
                  {!! csrf_field() !!}
                  <div class="form-body">
                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="name">{{trans('labels.menu.name')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="name" name="name" placeholder="{{trans('labels.menu.name')}}" value="">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="pid">{{trans('labels.menu.pid')}}</label>
                          <div class="col-md-8">
                              <select class="form-control" id="pid" name="pid">
                                  <option value="0">{{trans('labels.menuLevel')}}</option>
                                  @if($menus)
                                  @foreach($menus as $v)
                                  <option value="{{$v['id']}}">{{$v['name']}}</option>
                                  @endforeach
                                  @endif
                              </select>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="language">{{trans('labels.menu.language')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="language" name="language" placeholder="{{trans('labels.menu.language')}}" value="">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="icon">{{trans('labels.menu.icon')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="icon" name="icon" placeholder="{{trans('labels.menu.icon')}}" value="">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="slug">{{trans('labels.menu.slug')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="slug" name="slug" placeholder="{{trans('labels.menu.slug')}}" value="">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="url">{{trans('labels.menu.url')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="url" name="url" placeholder="{{trans('labels.menu.url')}}" value="">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="description">{{trans('labels.menu.description')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="description" name="description" placeholder="{{trans('labels.menu.description')}}" value="">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="sort">{{trans('labels.menu.sort')}}</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="sort" name="sort" placeholder="{{trans('labels.menu.sort')}}" value="">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.permission.status')}}</label>
                        <div class="col-md-10">
                            <div class="md-radio-inline">
                                <div class="md-radio">
                                    <input type="radio" id="status1" name="status" value="{{config('admin.global.status.active')}}" class="md-radiobtn">
                                    <label for="status1">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.permission.active.1')}} </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="status2" name="status" value="{{config('admin.global.status.audit')}}" class="md-radiobtn">
                                    <label for="status2">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.permission.audit.1')}} </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="status3" name="status" value="{{config('admin.global.status.trash')}}" class="md-radiobtn">
                                    <label for="status3">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.permission.trash.1')}} </label>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-actions">
                      <div class="">
                          <div class="col-md-offset-2 col-md-10">
                              <button type="submit" class="btn blue">{{trans('crud.submit')}}</button>
                          </div>
                      </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>

@endsection
@section('js')
<script type="text/javascript" src="{{asset('backend/plugins/jquery-nestable/jquery.nestable.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/plugins/layer/layer.js')}}"></script>
<script>
$(function() {

  $('#nestable_list').nestable({
    "maxDepth":2
  })
  .on('dragEnd', function(event, item, source, destination, position) {
      var currentItemId = $(item).attr('data-id');
      var currentItemPid = $(item).attr('data-pid');
      var itemParentId = $(item).parent().parent().attr('data-id');
      itemParentId = itemParentId == undefined ? 0:itemParentId;
      if (currentItemPid == itemParentId) {
        return false;
      }
      $.ajax({
        url:'/admin/menu/sort',
        data:{
          currentItemId:currentItemId,
          itemParentId:itemParentId,
        },
        dataType:'json',
        success:function(result) {
          layer.msg(result.msg,{icon: result? 6:5});
        }
      });
  });

  var menuFun = function() {
    var menuAttribute = function(menu) {
      $('#name').val(menu.name);
      $('#pid option[value='+menu.pid+']').attr('selected','true');
      $('#language').val(menu.language);
      $('#icon').val(menu.icon);
      $('#slug').val(menu.slug);
      $('#url').val(menu.url);
      $('#description ').val(menu.description  );
      $('#sort').val(menu.sort);
      $('input[type=radio][value='+menu.status+']').attr('checked','true');
      $('#menuForm').attr('action',menu.update);
      $('#menuForm').append('<input type="hidden" name="_method" value="PATCH">');
    };
    return {
      initAttribute : menuAttribute
    }
  }();

  $(document).on('click', '.editMenu', function () {
      var url = $(this).attr('data-href');
      $.ajax({
        url:url,
        dataType:'json',
        beforeSend:function() {
          App.blockUI({
              target: '#portlet_menu',
              boxed: true
          });
        },
        success:function(menu) {
          App.unblockUI('#portlet_menu');
          menuFun.initAttribute(menu);
          layer.msg(menu.msg,{icon:6});
        }
      });
  });

  $(document).on('click', '.createMenu', function () {
    var pid = $(this).attr('data-pid');
    $('#pid option[value='+pid+']').attr('selected','true').siblings().removeAttr('selected');
  });

  $(document).on('click','.destoryMenu',function() {
    var id = $(this).attr('data-id');
    layer.msg('{{trans('alerts.deleteTitle')}}', {
      time: 0, //不自动关闭
      btn: ['{{trans('crud.destory')}}', '{{trans('crud.cancel')}}'],
      icon: 5,
      yes: function(index){
        $('form[name=delete_item'+id+']').submit();
        layer.close(index);
      }
    });
  }); 
});

</script>

@endsection