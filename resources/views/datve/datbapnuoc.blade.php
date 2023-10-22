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

  <div class="container">
    <div class="row mt-4 ">
      <div class="col-md-8 p-1">
          <table class="table table-sm table-dark table-hover">
            <thead class="table-dark">
            <tr>
                <th></th>
                <th>Combo</th>
                <th>Giá Tiền</th>
                <th>Số lượng</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input class="btn-checkbox"   type="checkbox"  checked class="i-checks" name="input[]"></td>
                <td>
                  <div>1 Bắp 30OZ + 1 Nước 22OZ (Vị Caramel)</div>
                  <div>1 BẮP CARAMEL VỪA + 1 PESSI 22OZ</div>
                </td>
                <td>85.000 ₫</td>
                <td>
                  <div class="quantity d-flex">
                    <button class="decrease">-</button>
                    <input type="text" class="count" value="0">
                    <button class="increase">+</button>
                  </div>
                </td>
            </tr>
            <tr>
              <td><input class="btn-checkbox" type="checkbox"  checked class="i-checks" name="input[]"></td>
              <td>
                <div>1 Bắp 30OZ + 1 Nước 22OZ (Vị Caramel)</div>
                <div>1 BẮP CARAMEL VỪA + 1 PESSI 22OZ</div>
              </td>
              <td>85.000 ₫</td>
              <td>
                <div class="quantity d-flex">
                  <button class="decrease">-</button>
                  <input type="text" class="count" value="0">
                  <button class="increase">+</button>
                </div>
              </td>
            </tr>
            <tr>
              <td><input class="btn-checkbox"  type="checkbox"  checked class="i-checks" name="input[]"></td>
              <td>
                <div>1 Bắp 30OZ + 1 Nước 22OZ (Vị Caramel)</div>
                <div>1 BẮP CARAMEL VỪA + 1 PESSI 22OZ</div>
              </td>
              <td>85.000 ₫</td>
              <td>
                <div class="quantity d-flex">
                  <button class="decrease">-</button>
                  <input type="text" class="count" value="0">
                  <button class="increase">+</button>
                </div>
              </td>
            </tr>
            </tbody>
        </table>
        </div>

      <div class="col-md-4 ">
        <div class="corn-water-information-2 container">
          <div class="information-2-content ">
            <div class="information-2-content-img">
              <h4>Thanh gươm trừ tà</h4>
              <div class="information-2-content-text">Rio Đà Nẵng</div>
              <div class="information-2-content-text">Suất chiếu:15h40 12/10/2023</div>
              <div class="information-2-content-text">Ghế:A1 A2</div>
            </div>
          </div>
        </div>
        <div class="information-2-content-price">
          <div>TỔNG TIỀN</div>
          <div>175.000đ</div>
        </div>

        <div class="information-2-content-btn row mt-3">
          <div class="col-md-5">
            <button class="btn  btn-dark">thoát</button>
          </div>
          <div class="col-md-7">
            <button class="btn  btn-dark">Tiếp tục</button>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection