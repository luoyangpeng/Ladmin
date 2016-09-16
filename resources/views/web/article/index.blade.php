@extends('web.layout.web')

@section('content')
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container ">

    <!-- BEGIN BREADCRUMBS -->
    <div class="row breadcrumbs margin-bottom-40">
        <div class="container">
            <div class="col-md-4 col-sm-4">
                <h1>Blog Page</h1>
            </div>
            <div class="col-md-8 col-sm-8">
                <ul class="pull-right breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="">Pages</a></li>
                    <li class="active">Blog Page</li>
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
            <div class="col-md-9 col-sm-9 blog-posts margin-bottom-40">
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
            <!-- END LEFT SIDEBAR -->

            <!-- BEGIN RIGHT SIDEBAR -->
            <div class="col-md-3 col-sm-3 blog-sidebar">
                <!-- CATEGORIES START -->
                <h2>Categories</h2>
                <ul class="nav sidebar-categories margin-bottom-40">
                    <li><a href="#">London (18)</a></li>
                    <li><a href="#">Moscow (5)</a></li>
                    <li class="active"><a href="#">Paris (12)</a></li>
                    <li><a href="#">Berlin (7)</a></li>
                    <li><a href="#">Instanbul (3)</a></li>
                </ul>
                <!-- CATEGORIES END -->

                <!-- BEGIN RECENT NEWS -->
                <h2>Recent News</h2>
                <div class="recent-news margin-bottom-10">
                    <div class="row margin-bottom-10">
                        <div class="col-md-3">
                            <img src="front/assets/img/people/img2-large.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-9 recent-news-inner">
                            <h3><a href="#">Letiusto gnissimos</a></h3>
                            <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
                        </div>
                    </div>
                    <div class="row margin-bottom-10">
                        <div class="col-md-3">
                            <img src="front/assets/img/people/img1-large.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-9 recent-news-inner">
                            <h3><a href="#">Deiusto anissimos</a></h3>
                            <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
                        </div>
                    </div>
                    <div class="row margin-bottom-10">
                        <div class="col-md-3">
                            <img src="front/assets/img/people/img3-large.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-9 recent-news-inner">
                            <h3><a href="#">Tesiusto baissimos</a></h3>
                            <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
                        </div>
                    </div>
                </div>
                <!-- END RECENT NEWS -->


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