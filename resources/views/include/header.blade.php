<header id="site-header">
    <nav class="navbar navbar-expand-lg" style="background-color:rgba(0, 0, 0, 0.048);">
        <div class="container-fluid">
            <div class="logo"></div>
            @role('uservip')
                <a href="{{ route('pages.trangchu') }}" style="height: 80px; margin-right: 20px"><img class="navbar-brand"
                        src="{{ asset($meta_image_vip) }}" alt=""
                        style="width: 220px;  position:relative; z-index: 999; top: -35px; left: -20px"></a>
            @else
                <a href="{{ route('pages.trangchu') }}" style="height: 80px; margin-right: 20px"><img class="navbar-brand"
                        src="{{ asset($meta_image) }}" alt=""
                        style="width: 220px; position:relative; z-index: 999; top: -35px; left: -20px"></a>
            @endrole
            <button style="background-color: aliceblue" class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-ul navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)">
                        <a class="nav-link text-white me-3" href="#" id="navbarDropdown" role="button" style="magrin-bottom: 30px;">Danh mục <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgba(0, 0, 0, 0.749); display: grid; grid-template-columns: repeat(4, 1fr); width: auto">
                            @foreach ($category as $key => $cate)
                                <li class="nav-item" >
                                    <a class="nav-link" href="{{ route('category', $cate->slug) }}" style="color: white;"> <i class="fa-solid fa-play" style="font-size: 13px"></i> {{ $cate->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                
                    <li class="nav-item dropdown" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)">
                        <a class="nav-link text-white me-3" href="#" id="navbarDropdown" role="button" style="magrin-bottom: 30px;">Thể Loại <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgba(0, 0, 0, 0.749); display: grid; grid-template-columns: repeat(4, 1fr); width: auto">
                            @foreach ($genre as $key => $gen)
                                <li class="nav-item" >
                                    <a class="nav-link" href="{{ route('genre', $gen->slug) }}" style="color: white;"> <i class="fa-solid fa-play" style="font-size: 13px"></i> {{ $gen->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)">
                        <a class="nav-link text-white me-3" href="#" id="navbarDropdown" role="button" style="magrin-bottom: 30px;">Quốc gia <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgba(0, 0, 0, 0.749); display: grid; grid-template-columns: repeat(4, 1fr); width: auto">
                            @foreach ($country as $key => $coun)
                                <li class="nav-item" >
                                    <a class="nav-link" href="{{ route('country', $coun->slug) }}" style="color: white;"> <i class="fa-solid fa-play" style="font-size: 13px"></i> {{ $coun->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white me-3" href="{{ route('blog') }}" id="navbarDropdown"
                            role="button">Bài viết</a>
                    </li>


                </ul>
                <form class="d-flex" action="{{ route('search') }}" method="GET" role="search">
                    <div class="d-flex input-group">
                        <input class="form-control" id="timkiem" type="text" name="search" width="0"
                        placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" style=" border-radius: 0 10px 10px 0;"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <ul class="list-group" id="result"
                        style="display: none; position: absolute; top: 100%; border: 1px solid rgb(153, 153, 153); width: 250px; z-index: 999; ">
                    </ul>
                    </div>
            
                </form>

                <ul class="navbar-nav mb-2 mb-lg-0">
                    
                    <li class="nav-item dropdown ">
                        <a href="#" class="nav-link" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><img class="navbar-brand"
                                src="{{ asset('public/image/image-13.png') }}" alt=""></a>
                        <ul class="dropdown-menu" style="padding: 10px">
                            @auth
                                <li>Xin chào, {{ Auth::user()->username }}</li>
                            @endauth
                            <li><a class="dropdown-item" href="{{route('thongtin',$thong_tin_user)}}">Thông tin</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Đăng xuất</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mt-3 btn-vip">
                        <a class="btn btn-outline-success" href="{{ route('goiphim') }}"><i
                                class="fa-solid fa-star" style=" color: #efeb0b;"></i>VIP</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
