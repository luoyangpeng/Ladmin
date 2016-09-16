@extends('web.layout.web')

@section('css')
<link href="{{asset('backend/plugins/md-editor/css/editormd.preview.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
		<!-- BEGIN PAGE CONTAINER -->
<div class="page-container page-body-background">

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

				<div class="row">
					<div id="editormd-view">
						<textarea style="display: none" name="editormd-markdown-doc">{{$article['content']}}</textarea>
					</div>

				</div>
				<hr class="blog-post-sep">


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
	<script src="{{asset('backend/plugins/md-editor/lib/marked.min.js')}}"></script>
	<script src="{{asset('backend/plugins/md-editor/lib/prettify.min.js')}}"></script>
	<script src="{{asset('backend/plugins/md-editor/lib/raphael.min.js')}}"></script>
	<script src="{{asset('backend/plugins/md-editor/lib/underscore.min.js')}}"></script>
	<script src="{{asset('backend/plugins/md-editor/lib/sequence-diagram.min.js')}}"></script>

	<script src="{{asset('backend/plugins/md-editor/lib/flowchart.min.js')}}"></script>
	<script src="{{asset('backend/plugins/md-editor/lib/jquery.flowchart.min.js')}}"></script>

	<script src="{{asset('backend/plugins/md-editor/js/editormd.js')}}"></script>
	<script type="text/javascript">
		$(function() {
			var editormdView;
			var markdown  = "";
			editormdView = editormd.markdownToHTML("editormd-view", {
				markdown        : markdown ,//+ "\r\n" + $("#append-test").text(),
				//htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
				htmlDecode      : "style,script,iframe",  // you can filter tags decode
				//toc             : false,
				theme : "dark",
				previewTheme : "dark",
				editorTheme : "pastel-on-dark",
				tocm            : true,    // Using [TOCM]
				//tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
				//gfm             : false,
				//tocDropdown     : true,
				// markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
				emoji           : true,
				taskList        : true,
				tex             : true,  // 默认不解析
				flowChart       : true,  // 默认不解析
				sequenceDiagram : true,  // 默认不解析
			});

			//console.log("返回一个 jQuery 实例 =>", testEditormdView);

			// 获取Markdown源码
			//console.log(testEditormdView.getMarkdown());

			//alert(testEditormdView.getMarkdown());

		});

	</script>
@endsection
