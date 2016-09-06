@extends('layouts.admin')
@section('content')
<div class="page-bar">
	<ul class="page-breadcrumb">
	    <li>
	        <a href="{{url('admin')}}">{!! trans('labels.breadcrumb.home') !!}</a>
	        <i class="fa fa-angle-right"></i>
	    </li>
	    <li>
	        <a href="{{url('admin/user')}}">{!! trans('labels.breadcrumb.userList') !!}</a>
	        <i class="fa fa-angle-right"></i>
	    </li>
	    <li>
	        <span>{!! trans('labels.breadcrumb.userShow') !!}</span>
	    </li>
	</ul>
</div>
<div class="row margin-top-40">
  <div class="col-md-12">
      <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet light bordered">
          <div class="portlet-title">
              <div class="caption font-green-haze">
                  <i class="icon-settings font-green-haze"></i>
                  <span class="caption-subject bold uppercase">{!! trans('labels.breadcrumb.userShow') !!}</span>
              </div>
              <div class="actions">
                  <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
              </div>
          </div>
          <div class="portlet-body form">
              <form role="form" class="form-horizontal">
                  <div class="form-body">
                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label">{{trans('labels.user.name')}}</label>
                          <div class="col-md-8">
                              <div class="form-control form-control-static"> {{$user['name']}} </div>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label">{{trans('labels.user.email')}}</label>
                          <div class="col-md-8">
                              <div class="form-control form-control-static"> {{$user['email']}} </div>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label">{{trans('labels.user.confirm_email')}}</label>
                          <div class="col-md-8">
                              <div class="form-control form-control-static"> {!!confirmEmail($user['confirm_email'])!!} </div>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label">{{trans('labels.role.slug')}}</label>
                          <div class="col-md-8">
                              <div class="form-control form-control-static">  
                              @if($user['role'])
                              @foreach($user['role'] as $v)
                                <label class="tooltips margin-right-10" data-placement="top" data-original-title="{{$v['description']}}">{{$v['slug']}} @permission(config('admin.permissions.role.show'))(<small><a href="{{url('admin/role/'.$v['id'])}}" data-toggle="modal" data-target="#draggable" class="red-mint">{{trans('labels.role.show')}}</a></small>)@endpermission</label>
                              @endforeach 
                              @endif
                              </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.user.permission')}}</label>
                        <div class="col-md-8">
                          <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-md-1 text-center">{{trans('labels.role.module')}}</th>
                                        <th class="col-md-10 text-center">{{trans('labels.role.permission')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if($user['permission'])
                                  @foreach($user['permission'] as $permission)
                                    @foreach($permission as $k => $v)
                                      <tr>
                                        <td class="text-center" style="vertical-align: middle;"> {{$k}} </td>
                                        <td>
                                          @if(isDoubleArray($v))
                                          @foreach($v as $val)
                                          <div class="col-md-4">
                                            <label>{{$val['desc']}}</label>
                                          </div>
                                          @endforeach
                                          @else
                                          <div class="col-md-4">
                                            <label>{{$v['desc']}}</label>
                                          </div>
                                          @endif
                                        </td>
                                      </tr>
                                    @endforeach
                                  @endforeach
                                  @else
                                    <tr>
                                      <td colspan="2" class="text-center">{{trans('labels.user.info')}}</td>
                                    </tr>
                                  @endif
                                </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="form-actions">
                      <div class="row">
                          <div class="col-md-offset-2 col-md-10">
                              <a href="{{url('admin/user')}}" class="btn default">{{trans('crud.back')}}</a>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
<div class="modal fade" id="draggable" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  $(function() {
    /*modal事件监听*/
    $(".modal").on("hidden.bs.modal", function() {
         $(".modal-content").empty();
    });
  });
</script>
@endsection