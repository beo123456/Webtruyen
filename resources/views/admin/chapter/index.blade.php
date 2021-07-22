{{--  @extends('admin.layout.layout')
@section('title','Liệt Kê Chapter')
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
                <div class="card-header">Liệt Kê Chapter</div>

                             <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Tiêu Đề</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Thuộc Truyện</th>
                                    <th scope="col">Trạng Thái</th>
                                    <th scope="col">Quản Lý</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($chapter as $key => $value)
                                  <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $value['title'] }}</td>
                                    <td>{{ $value['slug'] }}</td>                                    
                                    <td>{{ $value->Story_Foreign->name }}</td>
                                    
                                    @if($value['status'] == 1)
                                    <td class="text text-success">Hiển Thị</td>
                                    @else
                                    <td class="text text-danger">Ẩn</td>
                                    @endif

                                    <td>
                                        <?php /////edit ?>
                                        <a href="{{ route('EditChapter',['id' => $value->id]) }}" class="btn btn-primary">Sửa</a>
                                        
                                        <?php ////delete ?>
                                        <form method="get" action="{{ route('DestroyChapter',['id' => $value->id]) }}">
                                            <button onclick="return confirm('Bạn muốn xóa chapter này?')" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                    
                                  </tr>
                                  @endforeach
            
                                </tbody>
                              </table>

            </div>
        </div>
    </div>
    {{ $chapter->links() }}

</div>
@endsection
  --}}
