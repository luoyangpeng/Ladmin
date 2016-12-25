@extends('web.layout.web')

@section('content')
    <div class="container">
         <div class="margin-bottom-40"></div>
         <div class="video" align="center">  
            <div id="jw_player"></div>  
        </div>
         <div class="margin-bottom-40"></div>
    </div>
   
@endsection


@section('js')
    <script src="//cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://content.jwplatform.com/libraries/QtpxB0Gb.js"></script>

    <script>jwplayer.key="pES2TFu8tO/o33W6FRv/OqGH0+wXANmsKx7p5Q==";</script>
     <script type="text/javascript">  
     
            //调用播放器  
            var poster = '/front/assets/img/banner.jpg';  

            var jw = jwplayer("jw_player").setup({  
                file:'rtmp://121.42.201.58:1935/live/livestream{{$roomId}}',  
                image: poster,  
                primary: 'flash',  
                flashplayer: '/front/jwplayer/jwplayer.flash.swf',      
                html5player: '/front/jwplayer/provider.html5.js',  
                width:981,  
                height:586,  
                startparam:true,
                autoplay:true,
                rtmp: {  
                    bufferlength: 0.1  
                }, 
                androidhls:"true", 
                volume : 80,
                autostart: true //自动播放

            });  
  
            
    </script>  

@endsection

