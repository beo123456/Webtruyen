@extends('admin.layout.layout')
@section('title','Liệt Kê Thể Loại Truyện')
@section('content')
<div class="container">

  <div class="card-body">
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif        
 </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header">Liệt Kê Thể Loại Truyện</div>
                 <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Thể Loại</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Mô Tả</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Quản Lý</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $key => $value)
                      <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td><a href="{{ route('StoryOfCategory',['id'=>$value->id]) }}">{{ $value['name'] }}</a></td>
                        <td>{{ $value['slug'] }}</td>
                        <td>{{ $value['desc'] }}</td>
                        @if($value['status'] == 1)
                        <td class="text text-success">Hiển Thị</td>
                        @else
                        <td class="text text-danger">Ẩn</td>
                        @endif
                        <td>

                            <a href="category/edit/{{$value->id}}" class="btn btn-primary">Sửa</a>

                            <form method="get" action="category/destroy/{{ $value->id }}">
                                @csrf
                                <button onclick="return confirm('Bạn muốn xóa Thể Loạinày. Lưu ý, sẽ xóa các truyện thuộc Thể Loại này!!!')" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>

            </div>
        </div>
    </div>
    {{ $category->links() }}
</div>
@endsection

