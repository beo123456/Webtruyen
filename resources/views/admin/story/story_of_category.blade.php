@extends('admin.layout.layout')
@section('title','Thể Loại '.$category->name)
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
                <div class="card-header">Truyện Theo Thể Loại {{ $category->name }}</div>

                             <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Mô Tả</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Thể Loại</th>
                                    <th scope="col">Trạng Thái</th>
                                    <th scope="col">Quản Lý</th>
                                    <th scope="col">Danh Sách Chương</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($story_of_category as $key => $value)
                                  <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $value['name'] }}</td>
                                    <td>{{ $value['slug'] }}</td>
                                    <td>{{ $value['desc'] }}</td>
                                    
                                    <td><img width="150px" height="200px" src="../../../public/backend/image/{{ $value['image'] }}" alt=""></td>
                                    <td>{{ $value->category_foreign->name }}</td>

                                    @if($value['status'] == 1)
                                    <td class="text text-success">Hiển Thị</td>
                                    @else
                                    <td class="text text-danger">Ẩn</td>
                                    @endif

                                    <td>
                                        <?php /////edit ?>
                                        <a href="{{ route('EditStory',[$value->id]) }}" class="btn btn-primary">Sửa</a>
                                        
                                        <?php ////delete ?>
                                        <form method="get" action="{{ route('DestroyStory',[$value->id]) }}">
                                            <button onclick="return confirm('Bạn muốn xóa truyện này?')" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                    <td><a href="{{ Route('ChapterList',['id'=>$value['id']]) }}">Danh Sách Chương</a></td>
                                    
                                  </tr>
                                  @endforeach
            
                                </tbody>
                              </table>

            </div>
        </div>
    </div>
    {{ $story_of_category->links() }}

</div>
@endsection

