<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
      .errors-message {
        color: red;
        font-size: 14px;
        font-weight: 600;
        margin-top: 10px;
        margin-bottom: 10px;
      }
    </style>
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
                <li class="nav-item">
                  <a class="nav-link active text-white" aria-current="page" href="{{route('blog.create')}}">Blog</a>
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
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
       
    $(document).on('change','.file_image',function(){

        var movie_id = $(this).data('movie_id');
        var files = $("#file-"+movie_id)[0].files;
        
        //console.log(files);
        var image = document.getElementById("file-"+movie_id).files[0];
        

        var form_data = new FormData();

        form_data.append("file", document.getElementById("file-"+movie_id).files[0]);
        form_data.append("movie_id",movie_id);
                $.ajax({
                    url:"{{route('update-image-movie-ajax')}}",
                    method:"POST",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:form_data,

                    contentType:false,
                    cache:false,
                    processData:false,

                    success:function(data){
                        location.reload();
                        $('#success_image').html('<span class="text-success">Cập nhật hình ảnh thành công</span>');
                    }
                });
    });
  </script>
  
  <script type="text/javascript">
    $('.slide_choose').change(function() {
        var slide_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('slide_choose') }}",
            method: "GET",
            data: {
              slide_val:slide_val,
              movie_id:movie_id,
            },
            success:function(data) {
                alert('Thay đổi thành công');
            }
        });
    })
</script>
  <script type="text/javascript">
    $('.phimhot_choose').change(function() {
        var phimhot_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('phimhot_choose') }}",
            method: "GET",
            data: {
              phimhot_val:phimhot_val,
              movie_id:movie_id,
            },
            success:function(data) {
                alert('Thay đổi thành công');
            }
        });
    })
</script>
  <script type="text/javascript">
    $('.trangthai_choose').change(function() {
        var trangthai_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('trangthai_choose') }}",
            method: "GET",
            data: {
              trangthai_val:trangthai_val,
              movie_id:movie_id,
            },
            success:function(data) {
                alert('Thay đổi thành công');
            }
        });
    })
</script>
  <script type="text/javascript">
    $('.country_choose').change(function() {
        var country_id = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('country_choose') }}",
            method: "GET",
            data: {
              country_id:country_id,
              movie_id:movie_id,
            },
            success:function(data) {
                alert('Thay đổi thành công');
            }
        });
    })
</script>

  <script type="text/javascript">
    $('.category_choose').change(function() {
        var category_id = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('category_choose') }}",
            method: "GET",
            data: {
              category_id:category_id,
              movie_id:movie_id,
            },
            success:function(data) {
                alert('Thay đổi thành công');
            }
        });
    })
</script>
  <script type="text/javascript">
    $('.select-movie').change(function() {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('select-movie') }}",
            method: "GET",
            data: {
                id:id
            },
            success:function(data) {
                $('#show_movie').html(data)
            }
        });
    })
</script>
  <script type="text/javascript">
    $('.select-year').change(function() {
        var year = $(this).find(':selected').val();
        var id_phim = $(this).attr('id');
        $.ajax({
            url: "{{ route('update-year-phim') }}",
            method: "GET",
            data: {
                year: year,
                id_phim: id_phim
            },
            success: function() {
                alert('Thay đổi phim năm' + year + 'thành công');
            }
        });
    })
</script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();
  } );
    function ChangeToSlug()
        {

            var slug;
         
            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }

      </script>

<script type="text/javascript">
    $(".order_position" ).sortable({
      placeholder : 'ui-state-highlight',
      update: function( event, ui ) {
        var array_id =[];
        $(".order_position tr").each(function(){
          array_id.push($(this).attr('id'));
        });
        $.ajax({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:"{{route('resorting')}}",
          method:"POST",
          data:{array_id:array_id},
          success:function(data){
            alert('Sắp xếp thứ tự thành công');
          }
        })
      }
    });
</script>

</body>

</html>