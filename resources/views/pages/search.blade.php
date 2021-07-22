@extends('../layout')
@section('title',"Kết Quả Tìm Kiếm: ".$keyword)
@section('content')
   <style>
       .infortruyen{
           list-style: none;
       }
   </style>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('Home') }}">Trang Chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Kết Quả Tìm Kiếm: {{ $keyword }}</li>
    </ol>
</nav>
{{--  ///search  --}}
<div>
  <form class="form-inline my-2 my-lg-0" method="get" action="search">
    @csrf
    <input class="form-control mr-sm-2" type="search" name="keyword"  placeholder="Tìm Kiếm Truyện, Tác Giả" aria-label="Tìm Kiếm">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Xác Nhận</button>
  </form>
  </div>
  {{--  ///result  --}}
<div class="container">
    <div class="row">
    <div class="col-8">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Tên Truyện</th>
        <th scope="col">Tác Giả</th>
        <th scope="col">Hình Ảnh</th>
        <th scope="col">Thể Loại</th>
      </tr>
    </thead>
    <tbody>

        @foreach($result as $value2)
      <tr>
        <td><a href="{{ route('DetailStory',['slug'=>$value2['slug']]) }}">{{ $value2->name }}</a></td>
        <td>{{ $value2->author }}</td>
        <td><a href="{{ route('DetailStory',['slug'=>$value2['slug']]) }}"><img width="100px" height="150px" src="public/backend/image/{{ $value2['image'] }}" alt=""></a></td>
        <td>{{ $value2->Category_foreign->name }}</td>
      </tr>
      
      @endforeach

    </tbody>
</table>


</div>

    {{--  //// category  --}}
    <div class="col-4">
      @include('pages/category')
         </div>




  

@endsection
