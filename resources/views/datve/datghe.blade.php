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

<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <div class="chair-film">
                <div class="chair-film-header">
                    Chọn ghế phim
                </div>
                <div class="chair-film-content">
                    <div class="screen">
                        Màn Hình
                    </div>
                    <div class="information-chair">
                        <div class="seating-container pb-3" id="seating-map"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="corn-water-information-2">
                <div class="chair-film-header">
                    Thông tin
                </div>  
              <div class="information-2-content ">
                <div class="information-2-content-img p-3">
                  <h4>Thanh gươm trừ tà</h4>
                  <div class="information-2-content-text">Rio Đà Nẵng</div>
                  <div class="information-2-content-text">Suất chiếu:15h40 12/10/2023</div>
                  <p >Ghế: <span class="information-2-content-text" id="selected-seat-list">Chưa có</span></p>
                </div>
              </div>
            </div>
            <div class="information-2-content-price mt-2">
                <p class="p-3">Tổng tiền: <span id="total-price">0</span> VNĐ</p>
            </div>
    
            <div class="information-2-content-btn row mt-3">
                <button class="btn  btn-dark col-md-5">thoát</button>

                <button class="btn  btn-dark col-md-7">Tiếp tục</button>

            </div>
    
          </div>
    </div>
</div>
@endsection