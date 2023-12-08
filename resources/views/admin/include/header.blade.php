<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target=".collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a class="navbar-brand"  style="margin-right: 50px" href="{{route('admin.dashboard')}}"><span class="fa fa-area-chart"></span> COSMIC<span
                            class="dashboard_text">Cinema</span></a></h1>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="sidebar-menu">
                    <li class="header">Điều hướng chính</li>

                    @php
                        $segment= Request::segment(1);   
                    @endphp
                    <li class="treeview {{($segment == 'category') ? 'active' : ''}}">
                        <a href="#">
                            <i class="fa fa-file"></i>
                            <span>Danh mục</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('category.create')}}"><i class="fa fa-angle-right"></i>Thêm danh mục</a></li>
                            <li><a href="{{route('category.index')}}"><i class="fa fa-angle-right"></i> Liệt kê danh mục</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{($segment == 'genre') ? 'active' : ''}}">
                        <a href="#">
                            <i class="fa fa-child"></i>
                            <span>Thể loại</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('genre.create')}}"><i class="fa fa-angle-right"></i> Thêm thể loại</a></li>
                            <li><a href="{{route('genre.index')}}"><i class="fa fa-angle-right"></i> Liệt kê thể loại</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{($segment == 'country') ? 'active' : ''}}">
                        <a href="#">
                            <i class="fa fa-globe"></i>
                            <span>Quốc gia</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('country.create')}}"><i class="fa fa-angle-right"></i> Thêm quốc gia</a></li>
                            <li><a href="{{route('country.index')}}"><i class="fa fa-angle-right"></i> Liệt kê quốc gia</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{($segment == 'movie') ? 'active' : ''}}">
                        <a href="#">
                            <i class="fa fa-film"></i>
                            <span>Phim</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('movie.create')}}"><i class="fa fa-angle-right"></i> Thêm phim</a></li>
                            <li><a href="{{route('movie.index')}}"><i class="fa fa-angle-right"></i> Liệt kê phim</a></li>
                            <li><a href="{{route('leech_movie')}}"><i class="fa fa-angle-right"></i> API Phim</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{($segment == 'linkmove') ? 'active' : ''}}">
                        <a href="#">
                            <i class="fa fa-film"></i>
                            <span>Server phim</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('linkmovie.create')}}"><i class="fa fa-angle-right"></i> Thêm  server phim</a></li>
                            <li><a href="{{route('linkmovie.index')}}"><i class="fa fa-angle-right"></i> Liệt kê server phim</a></li>
                            
                        </ul>
                    </li>

                    <li class="treeview {{($segment == 'episode') ? 'active' : ''}}">
                        <a href="#">
                            <i class="fa fa-clapperboard"></i>
                            <span>Tập phim</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('episode.create')}}"><i class="fa fa-angle-right"></i> Thêm tập phim</a></li>
                            <li><a href="{{route('episode.index')}}"><i class="fa fa-angle-right"></i> Liệt kê tập phim</a></li>
                        </ul>    
                    </li>

                    
                    <li class="treeview {{($segment == 'blog') ? 'active' : ''}}">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>Bài viết blog</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('blog.create')}}"><i class="fa fa-angle-right"></i> Thêm bài viết</a></li>
                            <li><a href="{{route('blog.index')}}"><i class="fa fa-angle-right"></i> Liệt kê bài viết</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>
</div>
<!--left-fixed -navigation-->

<!-- header-starts -->
<div class="sticky-header header-section" style="display: flex">
    <div class="header-left">

        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <div class="profile_details_left"><!--notifications of menu start -->
            <ul class="nofitications-dropdown">

            </ul>
        </div>
        <!--notification menu end -->

    </div>
    <div class="header-right">


        <!--search-box-->
        <div class="search-box">
            <form class="input">
                <input class="sb-search-input input__field--madoka" placeholder="Search..." type="search"
                    id="input-31" />
                <label class="input__label" for="input-31">
                    <svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77"
                        preserveAspectRatio="none">
                        <path d="m0,0l404,0l0,77l-404,0l0,-77z" />
                    </svg>
                </label>
            </form>
        </div><!--//end-search-box-->

        <div class="profile_details">
            <ul style="margin: 0">
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_img">
                            <span class="prfil-img"><img src="images/2.jpg" alt=""> </span>
                            <div class="user-name">
                                <p>Admin Name</p>
                                <span>Administrator</span>
                            </div>
                            <i class="fa fa-angle-down lnr"></i>
                            <i class="fa fa-angle-up lnr"></i>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <ul class="dropdown-menu drp-mnu">
                        <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                        <li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li>
                        <li> <a href="#"><i class="fa fa-suitcase"></i> Profile</a> </li>
                        <li> <a href="{{route('auth.logout')}}"><i class="fa fa-sign-out"></i> Logout</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>