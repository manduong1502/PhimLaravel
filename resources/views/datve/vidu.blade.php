<div class="container  mt-5">
    <div style="margin-bottom: 60px; " class="header-content">
      <h2 style="color: #fff">GỢI Ý HÔM NAY</h2>
    </div>
    <div class=" miscellaneous-content-header ">     
            <div class="miscellaneous-content-1-header">
                <div class="d-flex miscellaneous-content-1-header-ul">
                  <li><a class="content-header-li-a-1 active left-content-li-a" href="#danh-cho-ban"> CHO BẠN</a></li>
                  <li><a class="content-header-li-a-1" href="#san-pham-hot">SẢN PHẨM HOT</a></li>
                  <li><a class="content-header-li-a-1" href="#san-pham-si-le">SẢN PHẨM SỈ LẺ</a></li>
                  <li><a class="content-header-li-a-1 right-content-li-a" href="#set-combo">SET COMBO</a></li>
                </div>
            </div>
    </div>
  </div>

  <div class=" container mt-5 info-background">
    <div id="danh-cho-ban" class="info">
      <div class="detail-right-content">
        <div class="slide-card-detail">

            @foreach ($product_related->take(40) as $pro)
            <div class="card " style="margin-bottom: 10px;">
                <a href="{{$pro->link_shopee}}" style="text-decoration: none; color:black">
                <img src="{{asset('uploads/sanpham/'.$pro->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p style="text-transform: capitalize;" class="card-title">{{$pro->title}}</p>
                  <p class="card-text"> Giá: {{$pro->price_fake}}đ <p><del>{{ isset($pro->price) == null ? '' : $pro->price }}đ</del></p></p>
                </div>
            </a>
            </div>
            @endforeach
            
        </div>
    </div>
  </div>
    <div id="san-pham-hot" class="info">
      <div class="detail-right-content">
        <div class="slide-card-detail">

          @foreach($hots as $key =>$hot)
          <div class="card " style="margin-bottom: 10px;">
            <a href="{{$hot->link_shopee}}" style="text-decoration: none; color:black">
            <img src="{{asset('uploads/sanpham/'.$hot->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <p style="text-transform: capitalize;" class="card-title">{{$hot->title}}</p>
              <p class="card-text"> Giá: {{$hot->price_fake}}đ <p><del>{{ isset($hot->price) == null ? '' : $hot->price }}đ</del></p></p>
            </div>
        </a>
        </div>
          @endforeach
            
        </div>
    </div>
      
    </div>
      <div id="san-pham-si-le" class="info">
         
        <div class="detail-right-content">
          <div class="slide-card-detail">

            @foreach($siles as $key =>$hot)
            <div class="card " style="margin-bottom: 10px;">
              <a href="{{$hot->link_shopee}}" style="text-decoration: none; color:black">
                <img src="{{asset('uploads/sanpham/'.$hot->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p style="text-transform: capitalize;" class="card-title">{{$hot->title}}</p>
                  <p class="card-text"> Giá: {{$hot->price_fake}}đ <p><del>{{ isset($hot->price) == null ? '' : $hot->price }}đ</del></p></p>
                </div>
            </a>
            </div>
              @endforeach
                
            </div>
        </div>
        </div>


        <!-- begin info3-->
        <div id="set-combo" class="info">
          <div class="detail-right-content">
            <div class="slide-card-detail">
  
              @foreach($combos as $key =>$hot)
              <div class="card " style="margin-bottom: 10px;">
                <a href="{{$hot->link_shopee}}" style="text-decoration: none; color:black">
                <img src="{{asset('uploads/sanpham/'.$hot->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p style="text-transform: capitalize;" class="card-title">{{$hot->title}}</p>
                  <p class="card-text"> Giá: {{$hot->price_fake}}đ <p><del>{{ isset($hot->price) == null ? '' : $hot->price }}đ</del></p></p>
                </div>
            </a>
            </div>
              @endforeach
                
            </div>
        </div>
        </div>
        <!-- end info3-->

        
    </div>