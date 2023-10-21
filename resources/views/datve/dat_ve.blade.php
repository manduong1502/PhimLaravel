@extends('index')

@section('content')

<div class="steppage">
    <div class="container steppage-block">
      <div class="row steppage-block-header">
        <div class="col">
          <div class="active" id="item1">
            <i class="fa-solid fa-table-cells-large fa-2xl"></i>
            <p>Chọn ghế</p>
          </div>
        </div>
        <div class="col">
          <div id="item2">
            <i class="fa-solid fa-boxes-packing fa-2xl"></i>
            <p>Bắp nước</p>
          </div>
        </div>
        <div class="col">
          <div id="item3">
            <i class="fa-regular fa-credit-card fa-2xl"></i>
            <p>Thanh toán</p>
          </div>
        </div>
        <div class="col">
          <div id="item4">
            <i class="fa-solid fa-inbox fa-2xl"></i>
            <p>Thông tin vé</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="position">
    <div class="info">
      <div class="square1"></div>
      <p>Ghế bạn chọn</p>
    </div>
    <div class="info">
      <div class="square2"></div>
      <p>Ghế trống</p>
    </div>
    <div class="info">
      <div class="square3"><i class="fa-solid fa-xmark" style="color: #000000;"></i></div>
      <p>Ghế đã đặt</p>
    </div>
    <div class="info">
      <div class="square4"></div>
      <p>Ghế đôi</p>
    </div>
  </div>
@endsection