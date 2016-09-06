<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler"> </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  sidebar-search-bordered" action="" method="GET">
                    <a href="javascript:;" class="remove">
                        <i class="fa fa-times"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="fa fa-search"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="heading start">
                <h3 class="uppercase"></h3>
            </li>
            @if($menus)
            @foreach($menus as $v)
            @permission($v['slug'])
            @if($v['child'])
            <li class="nav-item  {{active_class(if_uri_pattern(explode(',',$v['url'])),'active open')}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="{{$v['icon']}}"></i>
                    <span class="title">{{$v['name']}}</span>
                    <span class="arrow {{active_class(if_uri_pattern(explode(',',$v['url'])),'open')}}"></span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    @foreach($v['child'] as $val)
                    @permission($val['slug'])
                    <li class="nav-item {{active_class(if_uri_pattern([$val['url'].'*']),'active')}}">
                        <a href="{{url($val['url'])}}" class="nav-link">
                            <i class="{{$val['icon']}}"></i>
                            <span class="title">{{$val['name']}}</span>

                        </a>
                    </li>
                    @endpermission
                    @endforeach
                </ul>
            </li>
            @else
            <li class="nav-item {{active_class(if_uri_pattern([$v['url']]))}}">
                <a href="{{url($v['url'])}}" class="nav-link nav-toggle">
                    <i class="{{$v['icon']}}"></i>
                    <span class="title">{{$v['name']}}</span>
                </a>
            </li>
            @endif
            @endpermission
            @endforeach
            @endif
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR