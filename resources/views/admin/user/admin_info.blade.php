@extends('layouts.admin')
@section('css')
    <link href="{{asset('backend/css/profile.min.css')}}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')
<div class="page-bar">
	<ul class="page-breadcrumb">
	    <li>
	        <a href="{{url('admin')}}">{!! trans('labels.breadcrumb.home') !!}</a>
	        <i class="fa fa-angle-right"></i>
	    </li>

	    <li>
	        <span>{!! trans('labels.breadcrumb.changeProfile') !!}</span>
	    </li>
	</ul>
</div>
<div class="row margin-top-40">
  <div class="col-md-12">


      <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet light bordered">
          <div class="portlet-title">
              <div class="caption font-green-haze">

                  <span class="caption-subject bold uppercase">{!! trans('labels.breadcrumb.changeProfile') !!}</span>
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
              <div class="clearfix">
                <div class="col-md-2">
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet ">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img src="/backend/img/avatar3_small.jpg" class="img-responsive" alt="">
                            </div>
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> {{auth()->user()->name}} </div>

                            </div>
                            <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li >
                                        <a href="{{url('admin/user/profile')}}/{{auth()->user()->id}}">
                                            <i class="icon-home"></i> 我的资料 </a>
                                    </li>
                                    <li class="active">
                                        <a href="{{url('admin/user/change')}}/{{auth()->user()->id}}">
                                            <i class="icon-settings"></i>账号设置  </a>
                                    </li>

                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>

                    </div>
                </div>
                <div class="col-md-10">
                    @include('flash::message')

                  <form role="form" class="form-horizontal" method="POST" action="{{url('admin/user/post_info')}}">
                        {!! csrf_field() !!}
                      <input type="hidden" name="id" value="{{$id}}">
                      <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="name">{{trans('labels.user.name')}}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{trans('labels.user.name')}}">
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>

                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="email">{{trans('labels.user.email')}}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"  name="email" placeholder="{{trans('labels.user.email')}}">
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
  </div>
</div>
@endsection