<div class="cbp-loadMore-block{{$page-1}}">
    @foreach($image_list['data'] as $k=>$v)
        <div class="cbp-item graphic">
            <div class="cbp-caption">
                <div class="cbp-caption-defaultWrap">
                    <img src="http://o6hc01bvr.bkt.clouddn.com/{{$v['path']}}" alt=""> </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <a href="#" class="cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase" rel="nofollow">删除</a>
                            <a href="http://o6hc01bvr.bkt.clouddn.com/{{$v['path']}}" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard">查看</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    @endforeach
</div>


@if($last_page)
 @for ($i = 1; $i < $last_page+1; $i++)
    @if($i != ($page-1))
    <div class="cbp-loadMore-block{{$i}}">
    </div>
    @endif
@endfor
@endif


