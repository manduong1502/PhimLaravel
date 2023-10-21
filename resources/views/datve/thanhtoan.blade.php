@extends('index')

@section('content')

<div class="steppage">
    <div class="container steppage-block">
      <div class="row steppage-block-header">
        <div class="col">
          <div id="item1">
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
          <div class="active" id="item3">
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

  <div class="content-pay">
    <div class="content-left">
        <div class="thongtin">
            <div class="container col-10 float-lg-start" style="margin-left: 90px; margin-top: 30px; ">
                <table class="table table-dark" style="border: 2px solid black; ">
                  <thead class="table-secondary">
                    <div style="background: #353535;">
                        <tr>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                          </tr>
                    </div>
                  </thead>
                  <tbody>
                    <tr class="table-food">
                      <td>Ghế thường</td>
                      <td>2</td>
                      <td>90,000 đ</td>
                    </tr>
                    <tr class="table-food">
                      <td>Bắp 300Z + Nước 220Z (Vi Caramel)</td>
                      <td>1</td>
                      <td>85,000 đ</td>
                    </tr>
                    <tr class="table-food">
                      <td>Phí tiện ích</td>
                      <td></td>
                      <td>9,000 đ</td>
                    </tr>
                    <tr class="table-food">
                      <td>Tổng:</td>
                      <td></td>
                      <td>184,000 đ</td>
                    </tr>
                  </tbody>
                </table>
          </div>
        </div>
        <div class="pay">
            <div class="container col-10 float-lg-start" style="margin-left: 90px; margin-top: 10px;">
                <table class="table table-dark" style="border: 2px solid black; ">
                  <thead class="table-secondary">
                    <div style="background: #353535;">
                        <tr>
                            <th scope="col">Hình thức thanh toán</th>
                        </tr>
                    </div>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="button-pay">
                        <div>
                            <button>
                              <img src="https://cdn.haitrieu.com/wp-content/uploads/2022/10/Logo-MoMo-Square-768x768.png" alt="">
                              <p>Ví MoMo</p>
                            </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="button-pay">
                        <div>
                            <button>
                              <img src="https://i.pinimg.com/originals/ae/fd/d4/aefdd47961a34d6c097fff56e6f3d58d.png" alt="">
                              <p>Chuyển khoản / Quét mã QR</p>
                            </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="button-pay">
                        <div>
                            <button>
                              <img src="https://www.aub.com.ph/aubpaymate/resources/images/QRAcceptance/Mobile%20version/ShopeePay%20logo-11.png" alt="">
                              <p>Ví ShopeePay</p>
                            </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="button-pay">
                        <div>
                            <button>
                              <img src="https://th.bing.com/th/id/OIP.0gGlsOU9hw-kNtZEOLAGIQHaHa?pid=ImgDet&rs=1  " alt="">
                              <p>Thẻ Visa / Master / JCB</p>
                            </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="button-pay">
                        <div>
                            <button>
                              <img src="https://png.pngtree.com/png-vector/20190916/ourlarge/pngtree-banking-card-icon-for-your-project-png-image_1731126.jpg" alt="">
                              <p>Thẻ ATM (thẻ nội địa)</p>
                            </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="button-pay">
                        <div>
                            <button>
                              <img src="https://th.bing.com/th/id/OIP.sF68L6ehBoHF-wBxT2_yIQHaHa?w=210&h=210&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="">
                              <p>Ví FoxPay</p>
                            </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div>
    </div>
    <div class="content-right">
      <div class="total_time">
        <div class="total">
          <p>Tổng đơn hàng</p>
          <h6>184,000 đ</h6>
        </div>
        <div class="time">
          <p>Thời gian giữ ghế</p>
          <h6>15:00</h6>
        </div>
      </div>
      <div class="rules">
        <p>Vé đã mua không thể đổi hoặc hoàn tiền.
          Mã vé sẽ được gửi 01 lần qua số điện thoại và email đã nhập, Vui lòng kiểm tra lại thông tin trước khi tiếp tục.</p>
      </div>
      <button><p>Thanh toán</p></button>
    </div>
  </div>

  <div class="infomation">
    <form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Họ và tên</label>
        <input type="text" class="form-control">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Email</label>
        <input type="email" class="form-control">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
        <input type="number" class="form-control">
      </div>
    </form>
  </div>

@endsection