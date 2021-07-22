@extends('admin.layout.layout')
@section('title','Cập Nhật Chapter Truyện')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập Nhật Truyện</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                           {{--  upload  --}}
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        
          {!! ShowErrors($errors,'name') !!}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên Truyện</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $story['name'] }}" name="name" placeholder="Nhập tên truyện">
                        </div>
                      
            {!! ShowErrors($errors,'desc') !!}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tóm Tắt Truyện</label>
                          <textarea style="resize: none" rows="5" name="desc" type="text" class="form-control" placeholder="Mô tả">{{ $story['desc'] }}</textarea>        
                        </div>

                        {!! ShowErrors($errors,'author') !!}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên Tác Giả</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $story['author'] }}" name="author" placeholder="Nhập tên tác giả">
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh Truyện</label>
                            <input type="file" name="image" class="form-control-file">
                            <img src="../public/backend/image/{{ $story['image'] }}" alt="">
                          </div>

                        <div class="form-group">
                        <label>Danh Mục</label>
                          <select name="category_id" class="custom-select">
                            @foreach($category as $value)
                            @if($value['id'] == $story['category_id'] )
                            <option value="{{ $value['id'] }}" selected>{{ $value['name'] }}</option>
                            @else
                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                            @endif
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Nổi Bật</label>
                          <select name="status" class="custom-select">
                            @if($story['status'] == 1)
                            <option value="1" selected>Hiển Thị</option>
                            <option value="2">Ẩn</option>
                            @else
                            <option value="1" >Hiển Thị</option>
                            <option value="2" selected>Ẩn</option>
                            @endif
                          </select>
                        </div>
                     
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </form>
                           
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection

