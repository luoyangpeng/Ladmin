<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
    <title>分享</title>
</head>


<body>

微信分享
<script type="text/javascript" charset="utf-8">
    wx.config(<?php echo $js->config(array('onMenuShareAppMessage', 'onMenuShareTimeline'), true) ?>);


    wx.ready(function(){
        //getLocation();
        wx.onMenuShareTimeline({
            title: '{{$data['title']}}', // 分享标题
            link: '{{$data['link']}}', // 分享链接
            imgUrl: '{{$data['imgUrl']}}', // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });

        wx.onMenuShareAppMessage({
            title: '{{$data['title']}}', // 分享标题
            desc: '{{$data['desc']}}', // 分享描述
            link: '{{$data['link']}}', // 分享链接
            imgUrl: '{{$data['imgUrl']}}', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });

    });
</script>


</body>

</html>