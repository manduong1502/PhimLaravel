<header id="site-header">
    <nav class="navbar navbar-expand-lg" style="background-color:rgba(0, 0, 0, 0.50);">
      <div class="container-fluid">
        <a href="{{route('pages.trangchu')}}"><img class="navbar-brand" src="public/image/logo/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-ul navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Danh mục</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:rgba(0, 0, 0, 0.50);">
                @foreach($category as $key =>$cate)
                  <li><a title="{{$cate->title}}" class="dropdown-item" href="{{route('category',$cate->slug)}}" style="color: white;">{{$cate->title}}</a></li>
                @endforeach
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Thể Loại</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:rgba(0, 0, 0, 0.50);">
                @foreach($genre as $key =>$gen)
                  <li ><a title="{{$gen->title}}" class="dropdown-item" href="{{route('genre',$gen->slug)}}" style="color: white;">{{$gen->title}}</a></li>
                @endforeach
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Quốc gia</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:rgba(0, 0, 0, 0.50);">
                @foreach($country as $key =>$coun)
                  <li ><a title="{{$coun->title}}" class="dropdown-item" href="{{route('country',$coun->slug)}}" style="color: white;">{{$coun->title}}</a></li>
                @endforeach
              </ul>
            </li>

          </ul>
          <form class="d-flex" action="{{route('search')}}" method="GET">
            <div class="d-flex input-group">
            <input type="text" name="search" class="form-control me-2" id="timkiem" placeholder="Search" autocomplete="off" >
            <button class="btn btn-outline-success">Search</button>
            </div>
          </form>
          
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item mt-3">
              <a class="nav-link active text-white" aria-current="page" href="#"><i class="fa-regular fa-clock"></i> Xem
                lịch
                sử</a>
            </li>
            <li class="nav-item dropdown ">
              <a href="#" class="nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img
                  class="navbar-brand" src="public/image/image-13.png" alt=""></a>
              <ul class="dropdown-menu">
                @auth
                    <li>Xin chào, {{ Auth::user()->username }}</li>
                @endauth
                <li><a class="dropdown-item" href="#">Thông tin</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{route('auth.logout')}}">Đăng xuất</a></li>
              </ul>
            </li>
            <li class="nav-item mt-3 btn-vip">
              <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-star"></i>VIP</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <ul class="list-group" id="result" style="display: none"></ul>