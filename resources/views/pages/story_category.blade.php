@extends('../layout')
@foreach($category as $value)
@section('title',"$value->name")
@section('content')
   <style>
       .infortruyen{
           list-style: none;
       }
   </style>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('Home') }}">Trang Chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $value->name }}</li>
    </ol>
</nav>

  {{--  ////////  --}}
<div class="container">
    <div class="row">
    <div class="col-8">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Tên Truyện</th>
        <th scope="col">Tác Giả</th>
        <th scope="col">Hình Ảnh</th>
      </tr>
    </thead>
    <tbody>

        @foreach($story as $value2)
        @if($value2['category_id'] == $value['id'])
      <tr>
        <td><a href="{{ route('DetailStory',['slug'=>$value2['slug']]) }}">{{ $value2->name }}</a></td>
        <td>{{ $value2->author }}</td>
        <td><a href="{{ route('DetailStory',['slug'=>$value2['slug']]) }}"><img width="100px" height="150px" src="../public/backend/image/{{ $value2['image'] }}" alt=""></a></td>
      </tr>
      @endif
      @endforeach

    </tbody>
</table>
</div>

    {{--  //// category  --}}
    <div class="col-4">
        <span>{{ $value->name }}: {{ $value->desc }}</span>
    @include('pages/category')
    </div>


@endforeach
{{--  {{ $story->links() }}  --}}

  

@endsection
