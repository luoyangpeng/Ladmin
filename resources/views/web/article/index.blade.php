@extends('web.layout.web')

@section('content')
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container page-body-background">

    <!-- BEGIN BREADCRUMBS -->
    <div class="row breadcrumbs margin-bottom-40">
        <div class="container">
            <div class="col-md-4 col-sm-4">
                <h1>博客</h1>
            </div>
            <div class="col-md-8 col-sm-8">
                <ul class="pull-right breadcrumb">
                    <li><a href="/">首页</a></li>
                    <li><a href="JavaScript:void(0)">博客列表</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- BEGIN CONTAINER -->
    <div class="container min-hight">
        <!-- BEGIN BLOG -->
        <div class="row">
            <!-- BEGIN LEFT SIDEBAR -->
            <div class="col-md-9 col-sm-9 padding-right-30">
                <div class=" blog-list margin-bottom-40 ">
                    @foreach($article_list as $article)
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <img src="{{$article['thumb']}}" alt="" class="img-responsive">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <h2><a href="#">{{$article['title']}}</a></h2>
                                <ul class="blog-info">
                                    <li><i class="fa fa-calendar"></i>{{$article['created_at']}} </li>
                                    <li><i class="fa fa-tags"></i> </li>
                                </ul>
                                <p>{{$article['desc']}}</p>
                                <a class="more" href="/blog/{{$article['id']}}">阅读全文 <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <hr class="blog-post-sep">
                    @endforeach


                    <div class="text-center">
                        <ul class="pagination pagination-centered">
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li class="active"><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END LEFT SIDEBAR -->

            <!-- BEGIN RIGHT SIDEBAR -->
            <div class="col-md-3 col-sm-3 blog-sidebar">

                <!-- BEGIN BLOG TAGS -->
                <div class="blog-tags margin-bottom-20">
                    <h2>Tags</h2>
                    <ul>
                        <li><a href="#"><i class="fa fa-tags"></i>OS</a></li>
                        <li><a href="#"><i class="fa fa-tags"></i>Metronic</a></li>
                        <li><a href="#"><i class="fa fa-tags"></i>Dell</a></li>
                        <li><a href="#"><i class="fa fa-tags"></i>Conquer</a></li>
                        <li><a href="#"><i class="fa fa-tags"></i>MS</a></li>
                        <li><a href="#"><i class="fa fa-tags"></i>Google</a></li>
                        <li><a href="#"><i class="fa fa-tags"></i>Keenthemes</a></li>
                        <li><a href="#"><i class="fa fa-tags"></i>Twitter</a></li>
                    </ul>
                </div>
                <!-- END BLOG TAGS -->
            </div>
            <!-- END RIGHT SIDEBAR -->
        </div>
        <!-- END BEGIN BLOG -->
    </div>
    <!-- END CONTAINER -->

</div>
<!-- END BEGIN PAGE CONTAINER -->

@endsection

@section('js')


@endsection