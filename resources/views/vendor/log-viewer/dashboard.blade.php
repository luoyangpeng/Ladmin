@extends('layouts.admin')
@section('css')
    <link href="http://cdn.bootcss.com/bootstrap-datetimepicker/4.14.30/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    @include('log-viewer::_template.style')
@endsection
@section('content')
<div class="page-bar">
  <ul class="page-breadcrumb">
      <li>
          <a href="{{url('admin/')}}">{!! trans('labels.breadcrumb.home') !!}</a>
          <i class="fa fa-angle-right"></i>
      </li>
      <li>
          <span>{!! trans('labels.breadcrumb.logList') !!}</span>
      </li>
  </ul>
</div>
<h3 class="page-header margin-top-40">Dashboard <small>Created with <i class="fa fa-heart"></i> by ARCANEDEV <sup>&copy;</sup></small></h3>

<div class="row">
    <div class="col-md-3">
        <canvas id="stats-doughnut-chart"></canvas>
    </div>
    <div class="col-md-9">
        @permission('admin.logs.list')
        <div class="alert alert-info"><strong>Info!</strong> LOGS list is <a href="{{url('admin/log-viewer/logs')}}">here</a></div>
        @endpermission
        <section class="box-body">
            <div class="row">
                @foreach($percents as $level => $item)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="dashboard-stat2 ">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                        {{ $item['name'] }}
                                    </h3>
                                    <small>{{ $item['count'] }} entries - {!! $item['percent'] !!} %</small>
                                </div>
                                <div class="icon">
                                    {!! log_styler()->icon($level) !!}
                                </div>
                            </div>
                            <div class="progress-info">
                                <div class="progress">
                                    <span style="width: {{ $item['percent'] }}%;" class="progress-bar progress-bar-success green-sharp">
                                        <span class="sr-only">{{ $item['percent'] }}% progress</span>
                                    </span>
                                </div>
                                <div class="status">
                                    <div class="status-title"> progress </div>
                                    <div class="status-number"> {{ $item['percent'] }}% </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
@section('js')
    <script src="http://cdn.bootcss.com/moment.js/2.11.2/moment-with-locales.min.js"></script>
    <script src="http://cdn.bootcss.com/Chart.js/1.0.2/Chart.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap-datetimepicker/4.15.35/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        Chart.defaults.global.responsive      = true;
        Chart.defaults.global.scaleFontFamily = "'Source Sans Pro'";
        Chart.defaults.global.animationEasing = "easeOutQuart";
    </script>
    <script>
        $(function() {
            var data = {!! $reports !!};

            new Chart($('#stats-doughnut-chart')[0].getContext('2d'))
                .Doughnut(data, {
                    animationEasing : "easeOutQuart"
                });
        });
    </script>
@endsection
