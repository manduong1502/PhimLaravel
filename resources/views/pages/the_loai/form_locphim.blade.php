<div class="container">
    <form action="{{ route('loc_phim') }}" method="get">
        @csrf
        <div class="row">

            <div class="col-md-2">
                <div class="form-group">

                    <select class="form-control stylish_filter" name="order" id="exampleFormControlSelect1">
                        <option value="">Sắp Xếp</option>
                        <option value="date">Ngày đăng</option>
                        <option value="year_release">Năm sản xuất</option>
                        <option value="name_movie">Tên Phim</option>
                        <option value="views">Lượt xem</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">

                    <select class="form-control stylish_filter" name="genre" id="exampleFormControlSelect1">
                        <option value="">Thể Loại</option>
                        @foreach ($genre as $key => $gen)
                        <option value="{{$gen->id}}">{{$gen->title}}</option>
                        @endforeach
                        
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">

                    <select class="form-control stylish_filter" name="country" id="exampleFormControlSelect1">
                        <option value="">Quốc gia</option>
                        @foreach ($country as $key => $coun)
                        <option value="{{$coun->id}}">{{$coun->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group stylish_filter">
                        {!! Form::selectYear('year', 2000, 2023,null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Năm phim'
                                ]) !!}
                </div>
            </div>
            <div class="col-md-2 ">
            <input style="margin-bottom:30px;background-color: rgb(8, 200, 8);" type="submit" class="btn  btn-default" value="Lọc Phim">
        </div>
        </div>
        
    </form>
</div>