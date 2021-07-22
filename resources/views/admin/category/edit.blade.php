@extends('admin.layout.layout')
@section('title','Cập Nhật Danh Mục Truyện')
@section('content')
<div class="container">

  <div class="card-body">
   

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập Nhật Danh Mục Truyện</div>
                    {{--  check session message  --}}
                    @if(session('message'))
                    <div class="text-success">{{ session('message') }}</div>
                    @endif
         

                <form method="post">
                    @csrf
                    {{--  check input  --}}
                    {!! ShowErrors($errors,'name') !!}
            <div class="form-group">
                          <label for="exampleInputEmail1">Tên Danh Mục</label>
                          <input type="text" class="form-control" name="name" value="{{ $category->name }}" >
            </div>
                     {{--  check input  --}}
                     {!! ShowErrors($errors,'desc') !!}
            <div class="form-group">
                          <label for="exampleInputEmail1">Mô Tả Danh Mục</label>
                          <textarea style="resize: none" rows="5" name="desc" type="text"  class="form-control" placeholder="Mô tả">{{ $category->desc }}</textarea>        
            </div>
            <div class="form-group">
                        <label >Trạng Thái</label>
                          <select name="status" class="custom-select">
                              @if($category['status'] == 1)
                            <option value="1" selected>Hiển Thị</option>
                            <option value="2">Ẩn</option>
                            @else
                            <option value="1" >Hiển Thị</option>
                            <option value="2" selected>Ẩn</option>
                            @endif
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

