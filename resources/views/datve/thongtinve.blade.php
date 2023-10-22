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

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="information-film">
                <div class="information-film-header">
                    Thông tin phim
                </div>
                <div class="information-film-content p-2">
                    <div class="information-film-content-text">Tên phim</div>
                    <div class="information-film-content-text">Suất Chiếu:</div>
                    <div class="information-film-content-text">Thời Lượng:</div>
                    <div class="information-film-content-text">Phòng chiếu:</div>
                    <div class="information-film-content-text">Số ghế:</div>
                    <div class="information-film-content-text">Rạp chiếu:</div>
                    <div class="information-film-content-text">Địa chỉ:</div>
                </div>
            </div>

            <div class="information-film mt-3">
                <div class="information-film-header">
                    Hóa đơn thanh toán
                </div>
                <div class="information-film-content mt-2">
                    <table class="table table-sm table-dark table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Hóa đơn thanh toán</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div>Ghế thường</div>
                                    <div>1 BẮP CARAMEL VỪA + 1 PESSI 22OZ(vị Caramel)</div>
                                    <div>Phí tiền ích</div>
                                    <div>Tổng</div>
                                </td>
                                <td>
                                    <div>2</div>
                                    <div>1</div>
                                </td>
                                <td>
                                    <div>90,000đ</div>
                                    <div>85,000đ</div>
                                    <div>9,000đ</div>
                                    <div>184,000đ</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="information-film">
                <div class="information-film-header">
                    Thông tin nhận vé
                </div>
                <div class="information-film-content p-2">
                    <div class="information-film-content-text">Họ và tên:</div>
                    <div class="information-film-content-text">Số điện thoại:</div>
                    <div class="information-film-content-text">Email:</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection