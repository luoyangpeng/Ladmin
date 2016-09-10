
<!-- BEGIN HEADER -->
    <div class="header navbar navbar-default navbar-static-top">

		<div class="container">
			<div class="navbar-header">
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<button class="navbar-toggle btn navbar-btn" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN LOGO (you can use logo image instead of text)-->
				<a class="navbar-brand logo-v1" href="/">
					<img src="/front/assets/img/logo.png" id="logoimg" alt="" >
				</a>
				<!-- END LOGO -->
			</div>
		
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown active">
                            <a class="dropdown-toggle" href="/">首页 </a>
                        
					</li>
                    <li class="dropdown">
                            <a class="dropdown-toggle" href="{{url('blog/')}}">博客  </a>
                        
                    </li>
					<li class="dropdown">
                        <a class="dropdown-toggle"  href="{{url('image/')}}">效果图</a>
                        
					</li>                        
					<li class="dropdown">
                        <a class="dropdown-toggle"  href="#">小游戏</a>
                        
					</li>
					<li class="dropdown">
                        <a class="dropdown-toggle"  href="#">帮助文档 </a>
                       
					</li>
					
                    <li class="menu-search">
                        <span class="sep"></span>
                        <i class="fa fa-search search-btn"></i>

                        <div class="search-box">
                            <form action="#">
                                <div class="input-group input-large">
                                    <input class="form-control" type="text" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn theme-btn">Go</button>
                                    </span>
                                </div>
                            </form>
                        </div> 
                    </li>
                </ul>                         
            </div>
            <!-- BEGIN TOP NAVIGATION MENU -->
		</div>
    </div>
    <!-- END HEADER -->
