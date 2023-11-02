@extends('admin.index')

@section('admin.content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#category">
    Thêm nhanh
  </button>
  
  <!-- Modal -->
  <div class="modal" id="category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header"> 
          <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm thể loại phim</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
              <div class="card-header">Quản lý thể loại</div>
              <div class="card-body container">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
                      {!! Form::open(['route' => 'genre.store', 'method' => 'POST']) !!}
                      <div class="form-group">
                        {!! Form::label('title', 'Tên thể loại', []) !!}
                        {!! Form::text('title', isset($genre) ? $genre->title : '', [
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
                        {!! Form::label('slug', 'Đường link', []) !!}
                        {!! Form::text('slug', isset($genre) ? $genre->slug : '', [
                            'class' => 'form-control',
                            'placeholder' => 'Nhập vào dữ liệu...',
                            'id' => 'convert_slug',
                        ]) !!}
                        @if ($errors->has('slug'))
                            <span class="errors-message">{{ $errors->first('slug') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('Active', 'Hiển Thị', []) !!}
                        {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($genre) ? $genre->status : '', [
                            'class' => 'form-control',
                        ]) !!}
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
                            <th scope="col">Tên thể loại</th>
                            <th scope="col">Đường link</th>
                            <th scope="col">Hiển thị</th>
                            <th scope="col">Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($list as $key => $cate)
                            <tr id="{{ $cate->id }}">
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $cate->title }}</td>
                                <td>{{ $cate->slug }}</td>
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
                                        'route' => ['genre.destroy', $cate->id, 'onsubmit' => 'return confirm("Bạn có muốn xóa hay ko?")'],
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('genre.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
