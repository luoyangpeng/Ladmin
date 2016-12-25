@extends('web.layout.web')

@section('css')
<link href="{{asset('front/assets/css/pages/portfolio.css')}}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')
<div class="container  ">
	<div class="margin-bottom-40"></div>
	<div class="row mix-grid thumbnails">
	      
	      <div class="col-md-6 col-sm-6 mix category_1 mix_all" style="display: block;  opacity: 1">
	        <div class="mix-inner">
	          <img class="img-responsive" src="/front/assets/img/apple.jpg" alt="" >
	          <div class="mix-details">
	             <h4>Ladmin直播</h4>
	           
	            <a href="{{url('live/info/1')}}"><i class="fa fa-search"></i></a>
	          </div> 
	          </div>                                       
	      </div>

	      <div class="col-md-6 col-sm-6 mix category_1 mix_all" style="display: block;  opacity: 1">
	        <div class="mix-inner">
	          <img class="img-responsive" src="/front/assets/img/apple.jpg" alt="" >
	          <div class="mix-details">
	             <h4>主播正在来的路上</h4>
	           
	            <a href="{{url('live/info/2')}}"><i class="fa fa-search"></i></a>
	          </div> 
	          </div>                                       
	      </div>

	      <div class="col-md-6 col-sm-6 mix category_1 mix_all" style="display: block;  opacity: 1">
	        <div class="mix-inner">
	          <img class="img-responsive" src="/front/assets/img/apple.jpg" alt="" >
	          <div class="mix-details">
	             <h4>主播正在来的路上</h4>
	           
	            <a href="{{url('live/info/3')}}"><i class="fa fa-search"></i></a>
	          </div> 
	          </div>                                       
	      </div>

	      <div class="col-md-6 col-sm-6 mix category_1 mix_all" style="display: block;  opacity: 1">
	        <div class="mix-inner">
	          <img class="img-responsive" src="/front/assets/img/apple.jpg" alt="" >
	          <div class="mix-details">
	             <h4>主播正在来的路上</h4>
	           
	            <a href="{{url('live/info/4')}}"><i class="fa fa-search"></i></a>
	          </div> 
	          </div>                                       
	      </div>




	  </div>
</div>

@endsection


@section('js')


@endsection