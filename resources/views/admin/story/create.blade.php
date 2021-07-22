@extends('admin.layout.layout')
@section('title','Thêm Truyện')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Truyện</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                            <?php //////////////// upload ?>
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        
          {!! ShowErrors($errors,'name') !!}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên Truyện</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('name') }}" name="name" placeholder="Nhập tên truyện">
                        </div>
                      
            {!! ShowErrors($errors,'desc') !!}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tóm Tắt Truyện</label>
                          <textarea style="resize: none" rows="5" value="{{ old('desc') }}" name="desc" type="text" class="form-control" placeholder="Mô tả"></textarea>        
                        </div>

                        {!! ShowErrors($errors,'author') !!}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên Tác Giả</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('author') }}" name="author" placeholder="Nhập tên tác giả">
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh Truyện</label>
                            <input type="file" name="image" class="form-control-file">
                          </div>

                        <div class="form-group">
                        <label>Danh Mục</label>
                          <select name="category_id" class="custom-select">
                            @foreach($category as $value)
                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Nổi Bật</label>
                          <select name="status" class="custom-select">
                            <option value="1" selected>Hiển Thị</option>
                            <option value="2">Ẩn</option>
                          </select>
                        </div>
                     
                        <button type="submit" class="btn btn-primary">Thêm Truyện</button>
                    </form>
                           
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection

