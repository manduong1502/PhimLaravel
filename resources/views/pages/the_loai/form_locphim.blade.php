
<div class="container">
    <form action="{{ route('loc_phim') }}" method="get">
        @csrf
        <div class="row loc_phim">

            <div class="col-md-2 lua_chon">
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
            <div class="col-md-2 lua_chon">
                <div class="form-group">

                    <select class="form-control stylish_filter" name="genre" id="exampleFormControlSelect1">
                        <option value="">Thể Loại</option>
                        @foreach ($genre as $key => $gen)
                        <option value="{{$gen->id}}">{{$gen->title}}</option>
                        @endforeach
                        
                    </select>
                </div>
            </div>
            <div class="col-md-2 lua_chon">
                <div class="form-group">

                    <select class="form-control stylish_filter" name="country" id="exampleFormControlSelect1">
                        <option value="">Quốc gia</option>
                        @foreach ($country as $key => $coun)
                        <option value="{{$coun->id}}">{{$coun->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2 lua_chon">
                <div class="form-group stylish_filter">
                        {!! Form::selectYear('year', 2000, 2023,null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Năm phim'
                                ]) !!}
                </div>
            </div>
            <div class="col-md-2 submit">
            <input style="background-color: #A41717;box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);color:aliceblue" type="submit" class="btn  btn-loc" value="Lọc Phim">
        </div>
        </div>
        
    </form>
    
</div>