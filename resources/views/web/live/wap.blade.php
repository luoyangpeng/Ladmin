<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="//cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
    <style>
        .video{
            width: 100%;
            height: 100%;
        }

    </style>
</head>
<body>

<video id="live" class="video"  preload="auto" autoplay>
    <source src="http://121.42.201.58:8888/live/livestream{{$roomId}}.m3u8" type="application/x-mpegURL">
</video>

</body>


</body>
</html>

