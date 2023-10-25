<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body>
    <header id="site-header container">
        <nav class="navbar navbar-expand-lg" style="background-color:rgba(0, 0, 0, 0.50);">
          <div class="container-fluid">
            <img class="navbar-brand" src="/public/image/logo/logo.png" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-ul navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{route('category.create')}}">Danh mục phim</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active text-white" aria-current="page" href="{{route('genre.create')}}">Thể loại</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active text-white" aria-current="page" href="{{route('country.create')}}">Quốc Gia</a>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link active text-white" aria-current="page" href="{{route('movie.create')}}">Phim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{route('episode.create')}}">Tập phim</a>
                </li>
              </ul>
              <form class="d-flex" action="" method="GET">
                <div class="d-flex input-group">
                  <input class="form-control me-2" id="timkiem" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
                <ul class="list-group " id="result" style="display:none"></ul>
              </form>
              <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown ">
                  <a href="#" class="nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img
                      class="navbar-brand" src="/public/image/image-13.png" alt=""></a>
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
              </ul>
            </div>
          </div>
        </nav>
      </header>

  <main>
    @yield('admin.content')
  </main>

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>

</html>