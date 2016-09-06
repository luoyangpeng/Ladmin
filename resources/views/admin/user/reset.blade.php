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
	        <span>{!! trans('labels.breadcrumb.userReset') !!}</span>
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
                  <span class="caption-subject bold uppercase">{!! trans('labels.breadcrumb.userReset') !!}</span>
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
              <form role="form" class="form-horizontal" method="POST" action="{{url('admin/user/reset')}}">
              		{!! csrf_field() !!}
                  <input type="hidden" name="id" value="{{$id}}">
                  <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="password">{{trans('labels.user.password')}}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="password" name="password" placeholder="{{trans('labels.user.password')}}">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>

                    <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="password_confirmation">{{trans('validation.attributes.password_confirmation')}}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{trans('validation.attributes.password_confirmation')}}">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-actions">
                      <div class="row">
                          <div class="col-md-offset-2 col-md-10">
                              <a href="{{url('admin/user')}}" class="btn default">{{trans('crud.cancel')}}</a>
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