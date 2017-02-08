<html>
<head>
    <link href="{{asset('backend/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- ajax 分页 -->
    <link type="text/css" rel="stylesheet" href="{{asset('backend/plugins/JqueryPagination/jquery.pagination.css')}}">
    <!-- 图片上传-->
    <link href="{{asset('backend/plugins/baidu-upload/css/webuploader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/plugins/baidu-upload/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/plugins/select2/select2.min.css')}}" rel="stylesheet" />
    <style>
        .select2-container .select2-selection--single {
            height: 38px !important;

        }
         .select2-selection--single .select2-selection__rendered {

            line-height: 38px !important;
        }
        #uploader .placeholder {
            padding-top: 50px !important;
            background:  center 50px no-repeat;
        }

    </style>
</head>

<body style="overflow: hidden;">
<div class="margin-top-40 col-md-6" style="margin-top: 10px">
    <ul class="nav nav-tabs" id="myTab">
            <li>
                <a href="#tab1" data-toggle="tab"> 图片库</a>
            </li>
            <li>
                <a href="#tab2" data-toggle="tab"> 图片上传 </a>
            </li>
        
    </ul>
</div>
<div  class="tab-content" >
    <div id="tab1" class="tab-pane active in" >
        <div class="ajax-content">

        </div>
        <div class="page-list" >
            <div id="page" class="m-pagination " style="position:absolute;bottom:-10px;right:20px;margin: 20px 30px;"></div>
        </div>
    </div>

    <div id="tab2" class="tab-pane" style="margin-top: 10px">
            
            <div class="form-group form-md-line-input form-horizontal">
                
                <div class="col-md-3">
                    <label class="col-md-2 control-label" for="pid">图片分类</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">选择图片分类</option>
                        <option value="1">广告</option>
                        <option value="2">文章图片</option>
                        <option value="3">其他</option>

                    </select>
                    <div class="form-control-focus"> </div>
                </div>
            </div>
           
            <div id="uploader" class="margin-top-40">
                <div class="queueList">
                    <div id="dndArea" class="placeholder">
                        <div id="filePicker"></div>
                        <p>或将照片拖到这里，单次最多可选300张</p>
                    </div>
                </div>
                <div class="statusBar" style="display:none;">
                    <div class="progress">
                        <span class="text">0%</span>
                        <span class="percentage"></span>
                    </div><div class="info"></div>
                    <div class="btns">

                        <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                    </div>
                </div>
            </div>
    </div>
</div>


<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper" style="display: none">

    <!--BEGIN CONTENT-->
    <div class="page-content">

        <div id="table-action" class="row ">
            <div class="imgbox">
                <div class="form-group">
                    <input type="hidden" />
                    <img src="" />
                </div>
            </div>
            <div class="col-lg-12 " id="imglist" style="display:none">


            </div>
        </div>
    </div>
    <!--END CONTENT-->
</div>

<script src="{{asset('backend/plugins/jquery.min.js')}}"></script>

<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>

<!-- ajax 分页 -->
<script src="{{asset('backend/plugins/JqueryPagination/jquery.pagination-1.2.7.js')}}"></script>


<script>
    var obj =  $("#imglist");
    var content = obj.html();
    var tag = '<span style="position:absolute;top: 40px;width:50px;left:45px" class=" col-sm-4 tag">'+
            '<i class="fa fa-check-circle" style="color:#ffffff;font-size:24px"></i>'+

            '</span>';

    function selectImg(t){
        $(".tag").remove();
        $(t).after(tag);//点击加上标记
        $(".thisimg").removeClass("chose_icon");
        $(t).addClass("chose_icon");
    }
    //tab 切换
    $(function () {
        $('#myTab a:first').tab('show'); // 选择第一个标签
        $('#myTab a').click(function (e) {
          e.preventDefault();

         $(this).tab('show');
        });
    });
</script>

<script>
    //ajax 分页
    $.fn.page.defaults = {
        pageSize: 10,


    };
    $("#page").page({

        remote: {
            url: '/admin/image/lib',  //请求地址
            params: { ajax: "true"},       //自定义请求参数
            beforeSend: function(XMLHttpRequest){
                //加载层
                //var index = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2

            },
            success: function (result, pageIndex) {
                //回调函数
                //result 为 请求返回的数据，呈现数据

                console.log(result);
                var data = result;
                content='<div  class="row-icons ajax-page" style="padding: 30px;">';
                for(var i=0;i<data['data'].length;i++) {

                    content +=

                            '<div class="imglist " style="margin-left:10px;margin-top:10px;float:left;position:relative">'+
                            '<img src ="http://o6hc01bvr.bkt.clouddn.com/'+data['data'][i]['path']+'" width="100px" height="100px" class="thisimg" onclick="selectImg(this)">'+

                            ' </div>';

                }
                content += '</div>';

                $(".ajax-content").html(content);


            },
            complete: function(XMLHttpRequest, textStatu){
                //...
            },
            pageIndexName: 'page',     //请求参数，当前页数，索引从0开始
            pageSizeName: 'pageSize',       //请求参数，每页数量
            totalName: 'total'              //指定返回数据的总数据量的字段名
        }
    });


   

</script>
 <!-- 图片上传js-->
    <script type="text/javascript" src="{{asset('backend/plugins/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/plugins/baidu-upload/js/webuploader.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/plugins/baidu-upload/upload.js')}}"></script>
    <script src="{{asset('backend/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript">
        $('select').select2();
    </script>
</body>

</html>
