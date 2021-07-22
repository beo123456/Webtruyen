@extends('admin.layout.layout')
@section('title','Thêm Chapter Truyện')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Chapter Truyện</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form method="post">
                        @csrf
                    <div class="form-group">
                        <label >Thuộc Truyện</label>
                        <select value="{{ old('story_id') }}" name="story_id" class="custom-select">
                            @foreach($story as $value)
                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Tiêu Đề</label>
                            {{--  check input  --}}
                          {!! ShowErrors($errors,'title') !!}
                          <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('title') }}" name="title" placeholder="Nhập tiêu đề">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội Dung Truyện</label>
                            {{--  check input  --}}
                            {!! ShowErrors($errors,'content') !!}
                            <textarea id="content" style="resize: none" rows="10" name="content" type="text" value="{{ old('content') }}" class="form-control ckeditor" placeholder="Nhập nội dung">
                              
                            </textarea>          
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


