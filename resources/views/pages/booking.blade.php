@extends('index')

@section('content')
<div class="detail-contents container">
    <div class="row p-4">
      <div class="col-md-3">
        <img src="public/image/image-40.png" alt="" style="width: 250px;">

      </div>
  
      <div class="col-md-9">  
        <h2>Thanh gươm trừ tà</h2>
        <div>Dr. Cheon and Lost Talisman - Action, Mystery, Thriller</div>
        <div class="btn-detail d-flex">
          <button class="btn btn-like"><i class="fa-solid fa-heart"></i> Thích</button>
          <button class="btn btn-assess"><i class="fa-solid fa-star"></i> Đánh giá</button>
          <button class="btn btn-booking"><i class="fa-solid fa-heart"></i>Đặt vé</button>
        </div>

        <div class="btn-detail d-flex">
            <div>Diễn viên: </div>
            <div class="btns-Actor">Jisoo</div>
            <div class="btns-Actor">Lee Kyu-ho</div>
            <div class="btns-Actor">Park Jung-Min</div>
            <div class="btns-Actor">Lee Jung-eun</div>
        </div>

        <div class="btn-detail d-flex">
            <div>Đạo diễn: </div>
            <div class="btns-Actor">Kim Seong-sik</div>
        </div>

        <div class="btn-detail detail-content">
            Chuyện phim xoay quanh nhân vật thầy trừ tà Cheon (Gang Dong Won thủ vai), cùng với chiến hữu của mình In Bae (Lee
            Dong Hwi thủ vai), chuyên đi lừa đảo với những màn trừ tà “pha ke" sử dụng công nghệ cao cùng khả năng hùng biện và
            tài “thao túng tâm lý" đỉnh cao. Tuy chuyên đi trừ tà nhưng cả hai đều không thể nhìn thấy và không tin vào ma quỷ
            cho tới khi họ phải đối đầu với một con ác quỷ thật đang khống chế em gái (Park So Yi thủ vai) của Yoo Kyung (Esom
            thủ vai). Yoo Kyung sở hữu “đôi mắt âm dương” có thể nhìn thấy những linh hồn. Kết hợp với thầy trừ tà Cheon và In
            Bae, họ phải đối đầu với con ác quỷ thật sự - Beom Cheom (Huh Joon Ho thủ vai) và từ đó, thầy trừ tà Cheon vô tình
            khám phá được bí mật đằng sau cái chết của em trai và ông nội mình. Nhận được sự giúp đỡ của một nhân vật bí ẩn cùng
            với những pha hành động trừ tà đẹp mắt, liệu thầy trừ tà Cheon có giúp được em gái của Yoo Kyung và diệt trừ ác quỷ
            đó?
        </div>

        <div class="showtime d-flex">
          <div class="showtime-block">
            <div class="showtime-block-text"><i class="fa-solid fa-calendar"></i> Khởi chiếu</div>
            <div class="showtime-block-time">06/10/2023</div>
          </div>
          <div class="showtime-block">
            <div class="showtime-block-text"><i class="fa-solid fa-clock"></i> Thời lượng</div>
            <div class="showtime-block-time">98 phút</div>
          </div>
          <div class="showtime-block">
            <div class="showtime-block-text"><i class="fa-solid fa-calendar"></i> Giới hạn tuổi</div>
            <div class="showtime-block-time">T16</div>
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
            <li><a href="#info2">Đặt vé</a></li>
            <li><a href="#info3">Đánh giá</a></li>
            <li><a href="#info4">Tin tức</a></li>
          </ul>
          <hr>
        </div>

        <div class="mb-3 container">
          <div id="info1" class="info">
            <iframe width="100%" height="515"src="https://www.youtube.com/embed/Se52HHs1jpk?start=12" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 10px;"></iframe>

          </div>


<!-- begin info2 -->
          <div id="info2" class="info">
            <div class="info2-content">
              <div class="row info2-content-form">
                <div class="col-md-6 info2-content-form-1">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Đà Nẵng</option>
                    <option value="1">Hà Nội</option>
                    <option value="2">Sài Gòn</option>
                    <option value="3">Nghệ An</option>
                  </select>
                </div>
          
                <div class="col-md-6 info2-content-form-2">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Định dạng</option>
                    <option value="1">2D</option>
                    <option value="2">3D</option>
                  </select>
                </div>
              </div>
            </div>
          
            <div class="info-2-calendars">
              <ul class="calendars-ul">
                <div class="calendar">
                  <div class="calendar-li ">
                    <li><a href="#item1">
                      <button id="button1">
                        <div class="calendar-month">9/10</div>
                        <div class="calendar-order">T2</div>
                      </button>
                    </a></li>
                  </div>
                  <div class="calendar-li">
                    <li><a href="#item2">
                      <button id="button2">
                        <div class="calendar-month">10/10</div>
                        <div class="calendar-order">T3</div>
                      </button>
                    </a></li>
                  </div>
                  <div class="calendar-li">
                    <li><a href="#item3">
                      <button id="button3">
                        <div class="calendar-month">11/10</div>
                        <div class="calendar-order">T4</div>
                      </button>
                    </a></li>
                  </div>
                  <div class="calendar-li">
                    <li><a href="#item4">
                      <button id="button4">
                        <div class="calendar-month">12/10</div>
                        <div class="calendar-order">T5</div>
                      </button>
                    </a></li>
                  </div>
                  <div class="calendar-li">
                    <li><a href="#item5">
                      <button id="button5">
                        <div class="calendar-month">13/10</div>
                        <div class="calendar-order">T7</div>
                      </button>
                    </a></li>
                  </div>
                </div>
              </ul>
              <div class="info-2-calendars">
                <div id="item1" class="item">
                  <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Rio Cinemas
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <div id="accordion1"></div>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          CGV Cinemas
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <div id="accordion2"></div>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Galaxy Cinema
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <div id="accordion3"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <script>
                  $('#button1').click(function() {
                      $('#accordion1').html('Nội dung mới cho button 1 <a href="" target="_blank"></a>');
                      $('#accordion2').html('Nội dung khác cho button 1');
                      $('#accordion3').html('Nội dung khác nữa cho button 1');
                  });
                  
                  $('#button2').click(function() {
                      $('#accordion1').html('Nội dung mới cho button 2');
                      $('#accordion2').html('Nội dung khác cho button 2 <a href="https://www.example.com" target="_blank">Click here</a>');
                      $('#accordion3').html('Nội dung khác nữa cho button 2');
                  });
                  
                  $('#button3').click(function() {
                      $('#accordion1').html('Nội dung mới cho button 3');
                      $('#accordion2').html('Nội dung khác cho button 3');
                      $('#accordion3').html('Nội dung khác nữa cho button 3 <a href="https://www.example.com" target="_blank">Click here</a>');
                  });

                  $('#button4').click(function() {
                      $('#accordion1').html('Nội dung mới cho button 5');
                      $('#accordion2').html('Nội dung khác cho button 5');
                      $('#accordion3').html('Nội dung khác nữa cho button 5 <a href="https://www.example.com" target="_blank">Click here</a>');
                  });

                  $('#button5').click(function() {
                      $('#accordion1').html('Nội dung mới cho button 5');
                      $('#accordion2').html('Nội dung khác cho button 5');
                      $('#accordion3').html('Nội dung khác nữa cho button 5 <a href="https://www.example.com" target="_blank">Click here</a>');
                  });
                  </script>


                <div id="item2" class="item">
                    <h2>Thông tin 4</h2>
                    <p>Nội dung thông tin 4 ở đây...</p>
                </div>
                <div id="item3" class="item">
                    <h2>Thông tin 5</h2>
                    <p>Nội dung thông tin 5 ở đây...</p>
                </div>
            </div>
            </div>
          </div>
<!-- end info2-->          

  
<!-- begin info3-->
          <div id="info3" class="info">
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
          <div id="info4" class="info">
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