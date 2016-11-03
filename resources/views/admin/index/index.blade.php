@extends('layouts.admin')

@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('admin')}}">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>控制台</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="margin-top-40">
    <div id="main"  style="width:1039px;height: 400px"></div>
</div>
@endsection

@section('js')
<script src="{{asset('backend/plugins/echarts/echarts.min.js')}}"></script>
    <script>
        var myChart = echarts.init(document.getElementById('main'));
        option = {
            title : {
                text: 'LAdmin网站用户访问来源',
                subtext: '纯属虚构',
                x:'center'
            },
            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data: ['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']
            },
            series : [
                {
                    name: '访问来源',
                    type: 'pie',
                    radius : '55%',
                    center: ['50%', '60%'],
                    data:[
                        {value:335, name:'直接访问'},
                        {value:310, name:'邮件营销'},
                        {value:234, name:'联盟广告'},
                        {value:135, name:'视频广告'},
                        {value:1548, name:'搜索引擎'}
                    ],
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
@endsection

