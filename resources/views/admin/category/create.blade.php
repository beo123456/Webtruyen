@extends('admin.layout.layout')
@section('title','Thêm thể loại Truyện')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm thể loại Truyện</div>
                {{--  check session message  --}}
                @if(session('message'))
                <div class="text-success">{{ session('message') }}</div>
                @endif


                    <form method="post">
                        @csrf
     {{--  check input  --}}
                        {!! ShowErrors($errors,'name') !!}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên thể loại</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('name') }}" name="name" placeholder="Nhập tên thể loại">
                        </div>
     {{--  check input  --}}
                        {!! ShowErrors($errors,'desc') !!}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Mô Tả thể loại</label>
                          <textarea style="resize: none" rows="5" name="desc" type="text" value="{{ old('desc') }}" class="form-control" placeholder="Mô tả"></textarea>        
                        </div>
                        <div class="form-group">
                        <label >Trạng Thái</label>
                          <select name="status" class="custom-select">
                            <option value="1" selected>Hiển Thị</option>
                            <option value="2">Ẩn</option>
                          </select>
                        </div>
                     
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                           
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection

