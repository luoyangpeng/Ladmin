@extends('web.layout.web')

@section('css')
<link href="{{asset('backend/plugins/md-editor/css/editormd.preview.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
		<!-- BEGIN PAGE CONTAINER -->
<div class="page-container page-body-background">

	<!-- BEGIN BREADCRUMBS -->
	<div class=" breadcrumbs margin-bottom-40">
		<div class="container">
			<div class="col-md-4 col-sm-4">
				<h1>博客</h1>
			</div>
			<div class="col-md-8 col-sm-8">
				<ul class="pull-right breadcrumb">
					<li><a href="{{url('/')}}">首页</a></li>
					<li><a href="{{url('/blog')}}">博客</a></li>
					<li class="active">{{$article['title']}}</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- END BREADCRUMBS -->

	<!-- BEGIN CONTAINER -->
	<div class="container min-hight" >
		<!-- BEGIN BLOG -->
		<div class="row">
			<!-- BEGIN LEFT SIDEBAR -->
			<div class="col-md-9 col-sm-9  ">

				<div class="margin-bottom-40 ">

					<div id="editormd-view">
						<h1 class="text-center">{{$article['title']}}</h1>
						<p>
							<spa class="margin-left-10"><i class="glyphicon glyphicon-calendar"></i> {{$article['created_at']}}</spa>
							<span class="margin-left-10"><i class="glyphicon glyphicon-user"></i> {{$article['author']}}</span>
							<span class="margin-left-10"><i class="glyphicon glyphicon-eye-open"></i> {{$article['view_count']}}</span>
						</p>

						<textarea style="display: none" name="editormd-markdown-doc">{{$article['content']}}</textarea>
					</div>

					<div class="white_bg padding20">
						<hr class="blog-post-sep">

						<!-- 代码1：放在页面需要展示的位置  -->
						<!-- 如果您配置过sourceid，建议在div标签中配置sourceid、cid(分类id)，没有请忽略  -->
						<div class="text-center" id="cyReward" role="cylabs" data-use="reward" sourceid="{{$article['id']}}" cid="{{$article['id']}}"></div>
						<!-- 代码2：用来读取评论框配置，此代码需放置在代码1之后。 -->
						<!-- 如果当前页面有评论框，代码2请勿放置在评论框代码之前。 -->
						<!-- 如果页面同时使用多个实验室项目，以下代码只需要引入一次，只配置上面的div标签即可 -->

						<div id="SOHUCS" sid="{{$article['id']}}"></div>
						<script type="text/javascript" charset="utf-8" src="https://changyan.itc.cn/js/lib/jquery.js"></script>
						<script type="text/javascript" charset="utf-8" src="https://changyan.sohu.com/js/changyan.labs.https.js?appid=cysBeFLSg"></script>
					</div>

				</div>


			</div>
			<!-- END LEFT SIDEBAR -->

			<!-- BEGIN RIGHT SIDEBAR -->
			<div class="col-md-3 col-sm-3 ">

				<!-- BEGIN BLOG TAGS -->
				<div class="blog-tags margin-bottom-20 white_bg panel panel-body">
					<div class="">
						<h2>文章分类</h2>
						<hr>
					</div>

					<ul>
						@foreach($category_list as $category)

							<li><a href="#"><i class="fa fa-tags"></i>{{$category['name']}}</a></li>

						@endforeach

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
				tocm            : true,    // Using [TOCM]
				//tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
				//gfm             : false,
				//tocDropdown     : true,
				//markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
				emoji           : true,
				taskList        : true,
				tex             : true,  // 默认不解析
				flowChart       : true,  // 默认不解析
				sequenceDiagram : true,  // 默认不解析
			});

			// 获取Markdown源码
			//console.log(testEditormdView.getMarkdown());

		});

	</script>

	<script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
	<script type="text/javascript">
		window.changyan.api.config({
			appid: 'cysBeFLSg',
			conf: '85d88bacecaced21c43f8ded47c1760f'
		});
	</script>

@endsection
