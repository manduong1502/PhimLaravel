<!DOCTYPE HTML>
<html>

<head>
    @include('admin.include.head')
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">

        @include('admin.include.header')
        <!-- //header-ends -->
        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="media">
                    <h2 class="title1">Thống kê web</h2>
                    <div class="col_3">
                        <div class="col-md-3 widget widget1">
                            <a href="{{ route('category.index') }}">
                                <div class="r3_counter_box">
                                    <i class="pull-left fa fa-file icon-rounded"></i>
                                    <div class="stats">
                                        <h5><strong>{{ $category_total }}</strong></h5>
                                        <span>Danh mục </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 widget widget1">
                            <a href="{{ route('genre.index') }}">
                                <div class="r3_counter_box">
                                    <i class="pull-left fa fa-child user1 icon-rounded"></i>
                                    <div class="stats">
                                        <h5><strong>{{ $genre_total }}</strong></h5>
                                        <span>Thể Loại</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 widget widget1">
                            <a href="{{ route('country.index') }}">
                                <div class="r3_counter_box">
                                    <i class="pull-left fa fa-globe user2 icon-rounded"></i>
                                    <div class="stats">
                                        <h5><strong>{{ $country_total }}</strong></h5>
                                        <span>Quốc gia</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 widget widget1">
                            <a href="{{ route('movie.index') }}">
                                <div class="r3_counter_box">
                                    <i class="pull-left fa fa-film dollar1 icon-rounded"></i>
                                    <div class="stats">
                                        <h5><strong>{{ $movie_total }}</strong></h5>
                                        <span>Phim</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 widget">
                            <a href="{{ route('blog.index') }}">
                                <div class="r3_counter_box">
                                    <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                                    <div class="stats">
                                        <h5><strong>{{ $blog_total }}</strong></h5>
                                        <span>Bài viết</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 widget">
                            <a href="{{ route('episodemovievip.index') }}">
                                <div class="r3_counter_box">
                                    <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                                    <div class="stats">
                                        <h5><strong>{{ $movie_vip_total }}</strong></h5>
                                        <span>Phim bản quyền </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="bs-example5 widget-shadow container" data-example-id="default-media">

                            <h1>
                                @if (session()->has('index_content'))
                                    {{ session('index_content') }}
                                    {{ session()->forget('index_content') }} {{-- Xóa nội dung sau khi hiển thị --}}
                                @endif
                            </h1>

                            <main>
                                @yield('admin.content')
                            </main>
                    </div>

                </div>
            </div>
        </div>
        <!--footer-->
        @include('admin.include.footer')
        <!--//footer-->
    </div>

    @include('admin.include.script')

</body>

</html>
