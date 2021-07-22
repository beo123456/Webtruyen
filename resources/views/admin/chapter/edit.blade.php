@extends('admin.layout.layout')
@section('title','Cập Nhật Chapter Truyện')
@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập Nhật Chapter Truyện</div>

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
                          @foreach($story as $value) /// lấy tất cả dl story
                          @if($chapter->story_id == $value->id) //// nếu chapter['story_id'] = story['id'] thì selected k thi echo hết list story
                          <option value="{{ $value['id'] }}" selected>{{ $value['name'] }}</option>
                          @else
                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                            @endif
                            @endforeach

                        </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Tiêu Đề</label>
                            {{--  check input  --}}
                          {!! ShowErrors($errors,'title') !!}
                          <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $chapter->title }}" name="title" placeholder="Nhập tiêu đề">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội Dung Truyện</label>
                            {{--  check input  --}}
                            {!! ShowErrors($errors,'content') !!}
                            <textarea id="content" style="resize: none" rows="10" name="content" type="text" value="{{ old('content') }}" class="form-control ckeditor" placeholder="Nhập nội dung">
                              {{ $chapter->content }}
                            </textarea>        
                        </div>
                           
                        

                        <div class="form-group">
                        <label >Trạng Thái</label>
                          <select name="status" class="custom-select">
                            @if($chapter->status == 1)
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


