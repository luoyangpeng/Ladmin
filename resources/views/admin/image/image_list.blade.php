@extends('layouts.admin')
@section('css')
    <link href="{{asset('backend/css/cubeportfolio.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/portfolio.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('admin/')}}">{!! trans('labels.breadcrumb.home') !!}</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{!! trans('labels.breadcrumb.imageList') !!}</span>
            </li>
        </ul>
    </div>

    <div class="portfolio-content portfolio-1">

        <div id="js-grid-juicy-projects" class="cbp">
            @foreach($image_list['data'] as $k=>$v)
            <div class="cbp-item graphic">
                <div class="cbp-caption">
                    <div class="cbp-caption-defaultWrap">
                        <img src="http://o6hc01bvr.bkt.clouddn.com/{{$v['path']}}" alt=""> </div>
                    <div class="cbp-caption-activeWrap">
                        <div class="cbp-l-caption-alignCenter">
                            <div class="cbp-l-caption-body">
                                <a href="javascript:void(0);" class=" destroy-image btn red " rel="nofollow" data-id="{{$v['id']}}">删除</a>
                                <a href="http://o6hc01bvr.bkt.clouddn.com/{{$v['path']}}" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard">查看</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            @endforeach

        </div>
        <div id="js-loadMore-juicy-projects" class="cbp-l-loadMore-button">
            <a href="{{url('admin/image/image_list')}}" data-page="1" data-href="{{url('admin/image/image_list')}}" class="cbp-l-loadMore-link btn grey-mint btn-outline" rel="nofollow">
                <span class="cbp-l-loadMore-defaultText">加载更多</span>
                <span class="cbp-l-loadMore-loadingText">LOADING...</span>
                <span class="cbp-l-loadMore-noMoreLoading">没有更多了</span>
            </a>
        </div>
    </div>
    </div>

@endsection

@section('js')

    <script type="text/javascript" src="{{asset('backend/js/jquery.cubeportfolio.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/portfolio-1.min.js')}}"></script>
    <script>
        $(function(){

            $(".destroy-image").click(function(){
                $r = confirm("真的要删除？");
                if(!$r){
                    return;
                }
                var id = $(this).attr("data-id");

                $.ajax({
                    url:"/admin/image/destroy/"+id,
                    dataType:"html",
                    type:"POST",
                    data:"_token={{csrf_token()}}",
                    success:function(data){
                        if(data){
                            alert('删除成功!');
                        }
                    },
                    error:function(data){

                    }
                });
            });
        });
    </script>
@endsection