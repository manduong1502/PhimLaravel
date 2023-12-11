@extends('admin.index')

@section('admin.content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý phim độc quyền </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($movievip))
                            {!! Form::open(['route' => 'movievip.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @else
                            {!! Form::open(['route' => ['movievip.update', $movievip->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Tên Phim', []) !!}
                            {!! Form::text('title', isset($movievip) ? $movievip->title : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'slug',
                                'onkeyup' => 'ChangeToSlug()',
                            ]) !!}
                            {{-- @if($errors->has('title'))
                            <span class="errors-message">{{$errors->first('title')}}</span>
                          @endif --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Đường link', []) !!}
                            {!! Form::text('slug', isset($movievip) ? $movievip->slug : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'convert_slug',
                            ]) !!}
                            {{-- @if($errors->has('slug'))
                            <span class="errors-message">{{$errors->first('slug')}}</span>
                          @endif --}}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả', []) !!}
                            {!! Form::textarea('description', isset($movievip) ? $movievip->description : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'description',
                            ]) !!}
                            {{-- @if($errors->has('description'))
                            <span class="errors-message">{{$errors->first('description')}}</span>
                          @endif --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('so_tap', 'Số Tập', []) !!}
                            {!! Form::text('so_tap', isset($movievip) ? $movievip->so_tap : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'slug',
                            ]) !!}
                            {{-- @if($errors->has('so_tap'))
                            <span class="errors-message">{{$errors->first('so_tap')}}</span>
                          @endif --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'Diễn viên (mỗi diễn viên cách dấu phẩy vd: dv1,dv2)', []) !!}
                            {!! Form::text('actor', isset($movievip) ? $movievip->actor : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                            {{-- @if($errors->has('actor'))
                            <span class="errors-message">{{$errors->first('actor')}}</span>
                          @endif --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('daodien', 'Daodien', []) !!}
                            {!! Form::textarea('daodien', isset($movievip) ? $movievip->daodien : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'daodien',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Active', 'Hiển thị', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($movievip) ? $movievip->status : '', [
                                'class' => 'form-control',
                            ]) !!}
                            {{-- @if($errors->has('status'))
                            <span class="errors-message">{{$errors->first('status')}}</span>
                          @endif --}}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Category', 'Danh mục', []) !!}
                            {!! Form::select('category_id', $category, isset($movievip) ? $movievip->category_id : '', [
                                'class' => 'form-control',
                            ]) !!}
                            {{-- @if($errors->has('category_id'))
                            <span class="errors-message">{{$errors->first('category_id')}}</span>
                          @endif --}}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Country', 'Quốc Gia', []) !!}
                            {!! Form::select('country_id', $country, isset($movievip) ? $movievip->country_id : '', ['class' => 'form-control']) !!}
                            {{-- @if($errors->has('country_id'))
                                <span class="errors-message">{{$errors->first('country_id')}}</span>
                            @endif --}}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Genre', 'Thể Loại', []) !!} <br>
                            {{-- {!! Form::select('genre_id', $genre, isset($movievip) ? $movievip->genre_id : '', ['class' => 'form-control']) !!} --}}
                            @foreach ($list_genre as $key => $list_gen)
                                @if (isset($movievip))
                                    {!! Form::checkbox(
                                        'genre[]',
                                        $list_gen->id,
                                        isset($movievip_genre) && $movievip_genre->contains($list_gen->id) ? true : false,
                                    ) !!}
                                @else
                                    {!! Form::checkbox('genre[]', $list_gen->id) !!}
                                @endif
                                {!! Form::label('genre', $list_gen->title) !!}
                            @endforeach
                        </div>


                        <div class="form-group">
                            {!! Form::label('Phim hot', 'Hiển thị slide', []) !!}
                            {!! Form::select('slide', ['0' => 'Không hiển thị', '1' => 'Hiển thị'], isset($movievip) ? $movievip->slide : '', [
                                'class' => 'form-control',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Phim hot', 'Đề xuất hot', []) !!}
                            {!! Form::select(
                                'phim_hot',
                                ['0' => 'Không hiển thị', '1' => 'Hiển thị'],
                                isset($movievip) ? $movievip->phim_hot : '',
                                [
                                    'class' => 'form-control',
                                ],
                            ) !!}
                            {{-- @if($errors->has('phim_hot'))
                                <span class="errors-message">{{$errors->first('phim_hot')}}</span>
                            @endif --}}
                        </div>


                        <div class="form-group">
                            {!! Form::label('Image', 'Ảnh nhỏ', []) !!}
                            {!! Form::file('image', ['class' => 'form-control-file']) !!}
                            @if (isset($movievip))
                                <img width="20%" src="{{ asset('uploads/movievip/' . $movievip->image) }}"alt="">
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Image', 'Ảnh lớn', []) !!}
                            {!! Form::file('image1', ['class' => 'form-control-file']) !!}
                            @if (isset($movievip))
                                <img width="20%" src="{{ asset('uploads/movievip/imagebig/' . $movievip->image1) }}"alt="">
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('title', 'Trailer (link cuối đuôi youtube)', []) !!}
                            {!! Form::text('trailer', isset($movievip) ? $movievip->trailer : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                        </div>


                        @if (!isset($movievip))
                            {!! Form::submit('Thêm dữ liêu', ['class' => 'btn btn-success mt-2']) !!}
                        @else
                            {!! Form::submit('Cập Nhập', ['class' => 'btn btn-success mt-2']) !!}
                        @endif

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
