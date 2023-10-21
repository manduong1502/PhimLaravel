@extends('index')

@section('content')
<div id="carouselExampleCaptions" class="carousel slide">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="dark-bg-image  ">
                <div class="dark-bg-image-2">
                    <img src="public/image/image-11.png" alt="...">
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
                <div class="detail-title responsive-text">Anh Bước Từ Ánh Sáng Lửa</div>
                <div class="detail-content-top mt-3 d-flex">
                    <div class="detail-content-top-text">Top 5</div>
                    <div class="detail-content-top-text-1">Top phim thịnh hành</div>
                </div>
                <div class="detail-title-small mt-3 d-flex ">
                    <div class="text-title">Lãng mạn</div>
                    <div class="text-title">Phiêu lưu</div>
                    <div class="text-title">Bí ẩn</div>
                </div>

                <div class="detail-title-small   mt-3 d-flex ">
                    <div class="text-title-name ">Diễn viên chính: </div>
                    <div class="d-flex">
                        <div class="text-title">Jisoo</div>
                        <div class="text-title">Lee Kyu-ho</div>
                        <div class="text-title">Park Jung-Min</div>
                    </div>
                </div>

                <div class="detail-title-small mt-3 row d-flex" style="text-align: left;">
                    <div class="text-title-name col-2 ">Miêu tả: </div>
                    <div class=" col-10">
                        <p>Thân Nhãn, sau khi chứng kiến cái chết của mẹ đã bị câm do bị PTSD. Cô mất đi tình yêu
                            thương của mẹ và phải đối mặt với sự lạnh lùng của cha- người đã đưa tình nh</p>
                    </div>
                </div>

                <div class="detail-title-small mt-2 d-flex" style="text-align: left;">
                    <button class="btn btn-issue"><i class="fa-solid fa-play"></i> Phát ngay</button>
                    <button class="btn btn-share"><i class="fa-solid fa-share"></i> Chia sẽ</button>
                    <button class="btn btn-share"><i class="fa-solid fa-cloud"></i> Sưu tập</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container miscellaneous mt-5">
<div class="row  miscellaneous-content">
  <div class="col-md-8 miscellaneous-content-1 ">
    <div class=" miscellaneous-content-1-header">
      <ul class="d-flex miscellaneous-content-1-header-ul container-fluid custom-list">
        <li><a href="#info1">Trailer</a></li>
        <li><a href="#info2">Đánh giá</a></li>
        <li><a href="#info3">Tin tức</a></li>
      </ul>
      <hr>
    </div>

    <div class="mb-3 container">
      <div id="info1" class="info">
        <iframe width="100%" height="515"src="https://www.youtube.com/embed/Se52HHs1jpk?start=12" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 10px;"></iframe>

      </div>
   

<!-- begin info3-->
      <div id="info2" class="info">
        <div class="container info3-assess-header">
            Bình luận
        </div>

        <div class="container info3-assess-block-comments">
          <div class="info3-assess-comments row">
            <div class="col-1 info3-assess-comment-img">
              <img src="public/image/image-13.png" width="50px" height="50px"  alt="">
            </div>
            <div class="col-11 info3-assess-comment-contents">
              <div class="info3-assess-comment-content-name">
                Vu tran
              </div>
              <div class="info3-assess-comment-content">
                Flim hay quá
              </div>
            </div>

            <div class="container info3-assess-comments-form row">
              <div class="info3-assess-comments-form-img col-1">
                <img src="public/image/image-13.png" style="margin-top: 33px;" width="50px" height="50px"  alt="">
              </div>
              <div class="info3-assess-comments-form-content col-11">
                <form action="">
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label text-black">Bình luận</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Bình luận</button>
                </form>
              </div>
            </div>
          </div>
      </div>
      </div>
<!-- end info3-->

<!-- begin info4-->
      <div id="info3" class="info">
        <div class="miscellaneous-content-2-block-film container d-flex">
          <div class="miscellaneous-content-2-block-film-img">
            <img src="public/image/image-37.png" height="170px" alt="">
          </div>

          <div class="miscellaneous-content-2-block-film-text">
            <h4>Review Thanh Gươm Trừ Tà - Sự kết hợp thú vị giữa hài và tâm linh</h6>
              <div class="blog-content-information d-flex">
                <p class="blog-content-information-text">Đánh giá phim</p>
                <p class="blog-content-information-text">levu2004</p>
                <p class="blog-content-information-number">14 giờ trước</p>
            </div>
            <p>Thanh Gươm Trừ Tà (Dr. Cheon And The Lost Talisman) đã mang đến những giây phút giải trí vui nhộn cho khán giả.</p>
          </div>
        </div>

        <div class="miscellaneous-content-2-block-film container d-flex">
          <div class="miscellaneous-content-2-block-film-img">
            <img src="public/image/image-37.png" height="170px" alt="">
          </div>

          <div class="miscellaneous-content-2-block-film-text">
            <h4>Review Thanh Gươm Trừ Tà - Sự kết hợp thú vị giữa hài và tâm linh</h6>
              <div class="blog-content-information d-flex">
                <p class="blog-content-information-text">Đánh giá phim</p>
                <p class="blog-content-information-text">levu2004</p>
                <p class="blog-content-information-number">14 giờ trước</p>
            </div>
            <p>Thanh Gươm Trừ Tà (Dr. Cheon And The Lost Talisman) đã mang đến những giây phút giải trí vui nhộn cho khán giả.</p>
          </div>
        </div>

        <div class="miscellaneous-content-2-block-film container d-flex">
          <div class="miscellaneous-content-2-block-film-img">
            <img src="public/image/image-37.png" height="170px" alt="">
          </div>

          <div class="miscellaneous-content-2-block-film-text">
            <h4>Review Thanh Gươm Trừ Tà - Sự kết hợp thú vị giữa hài và tâm linh</h6>
              <div class="blog-content-information d-flex">
                <p class="blog-content-information-text">Đánh giá phim</p>
                <p class="blog-content-information-text">levu2004</p>
                <p class="blog-content-information-number">14 giờ trước</p>
            </div>
            <p>Thanh Gươm Trừ Tà (Dr. Cheon And The Lost Talisman) đã mang đến những giây phút giải trí vui nhộn cho khán giả.</p>
          </div>
        </div>
      </div> 
    </div>
<!-- end info4-->

    
  </div>
  <div class="col-md-4 miscellaneous-content-2">
    <div class="miscellaneous-content-2-block ">
      <div class="miscellaneous-content-2-header">
        Phim đang chiếu
        
      </div>
      <hr>

      <div class="miscellaneous-content-2-block-film container d-flex">
        <div class="miscellaneous-content-2-block-film-img">
          <img src="public/image/image-46.png" alt="">
        </div>

        <div class="miscellaneous-content-2-block-film-text">
          <h6>Kumanthong: Quỷ linh nhi</h6>
          <p>Kumarn - Drama, Horror</p>
          <p>Khởi chiếu: 06/10/2023</p>
        </div>
      </div>

      <div class="miscellaneous-content-2-block-film container d-flex">
        <div class="miscellaneous-content-2-block-film-img">
          <img src="public/image/image-46.png" alt="">
        </div>

        <div class="miscellaneous-content-2-block-film-text">
          <h6>Kumanthong: Quỷ linh nhi</h6>
          <p>Kumarn - Drama, Horror</p>
          <p>Khởi chiếu: 06/10/2023</p>
        </div>
      </div>

      <div class="miscellaneous-content-2-block-film container d-flex">
        <div class="miscellaneous-content-2-block-film-img">
          <img src="public/image/image-46.png" alt="">
        </div>

        <div class="miscellaneous-content-2-block-film-text">
          <h6>Kumanthong: Quỷ linh nhi</h6>
          <p>Kumarn - Drama, Horror</p>
          <p>Khởi chiếu: 06/10/2023</p>
        </div>
      </div>

      <div class="miscellaneous-content-2-block-film container d-flex">
        <div class="miscellaneous-content-2-block-film-img">
          <img src="public/image/image-46.png" alt="">
        </div>

        <div class="miscellaneous-content-2-block-film-text">
          <h6>Kumanthong: Quỷ linh nhi</h6>
          <p>Kumarn - Drama, Horror</p>
          <p>Khởi chiếu: 06/10/2023</p>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
@endsection



