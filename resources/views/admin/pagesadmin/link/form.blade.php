@extends('admin.index')

@section('admin.content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#linkmovie">
  Thêm nhanh
</button>

<!-- Modal -->
<div class="modal" id="linkmovie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"> 
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm danh mục phim</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
            <div class="card-header">Quản lý danh mục</div>
            <div class="card-body container">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    {!! Form::open(['route' => 'linkmovie.store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Tên link', []) !!}
                        {!! Form::text('title', isset($linkmovie) ? $linkmovie->title : '', [
                            'class' => 'form-control',
                            'placeholder' => 'Nhập vào dữ liệu...',
                            'id' => 'slug',
                            'onkeyup' => 'ChangeToSlug()',
                        ]) !!}
                        @if ($errors->has('title'))
                            <span class="errors-message">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Mô tả đường link', []) !!}
                        {!! Form::text('description', isset($linkmovie) ? $linkmovie->description : '', [
                            'class' => 'form-control',  
                            'placeholder' => 'Nhập vào dữ liệu...',
                        ]) !!}
                        @if ($errors->has('title'))
                            <span class="errors-message">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('Active', 'Hiển thị', []) !!}
                        {!! Form::select(
                            'status',
                            ['1' => 'Hiển thị', '0' => 'Không hiển thị'],
                            isset($linkmovie) ? $linkmovie->status : '',
                            ['class' => 'form-control'],
                        ) !!}
                        @if ($errors->has('status'))
                            <span class="errors-message">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    {!! Form::submit('Thêm dữ liêu', ['class' => 'btn btn-primary mt-2']) !!}
                  </div>

                {!! Form::close() !!}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table mt-4 table-success table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên link</th>
                            <th scope="col">Mô tả link</th>
                            <th scope="col">Hiển thị</th>
                            <th scope="col">Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($list as $key => $cate)
                            <tr id="{{ $cate->id }}">
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $cate->title }}</td>
                                <td>{{ $cate->description }}</td>
                                <td>
                                    @if ($cate->status == 1)
                                        <span class="badge badge-success">Hiển thị</span>
                                    @else
                                        <span class="badge badge-danger">Không hiển thị</span>
                                    @endif
                                </td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['linkmovie.destroy', $cate->id, 'onsubmit' => 'return confirm("Bạn có muốn xóa hay ko?")'],
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('linkmovie.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
