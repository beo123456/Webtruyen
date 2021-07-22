@extends('../layout')
@foreach($story as $value)
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
      <li class="breadcrumb-item"><a href="{{ route('Category',['slug'=>$value->Category_foreign->slug]) }}">{{ $value->Category_foreign->name }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $value->name }}</li>
    </ol>
</nav>
  <div class="row">
      <div class="col-md-8">
        <div class="row">

            <div class="col-md-3">
                <img class="card-img-top" style="height: 250px; width: 100%; display: block;"
                src="../public/backend/image/{{ $value->image }}" data-holder-rendered="true">
               
            </div>
            <div class="col-md-5">
                <ul class="infortruyen">
                    <li>Tên Truyện: {{ $value->name }}</li>
                    <li>Tác Giả: {{ $value->author }}</li>
                    <li>Thể Loại: <a href="{{ route('Category',['slug'=>$value->Category_Foreign->slug]) }}">{{ $value->Category_foreign->name }}</a> </li>
       
                </ul>
            </div>
            @endforeach <?php /////endforeach story ?>

     
        </div>
        <br>
        <div class="col-md-12">
            <p style="text-align: justify">Nội Dung: <br> {{ $value->desc }}</p>
        </div>
    <h4>Mục Lục</h4>
    <hr>
    <ul class="mucluctruyen">
        @foreach($chapter as $value2)
        <li style="list-style: none"><a href="{{ route('ChapterDetail',['slug'=>$value2['slug']]) }}">{{ $value2->title }}</a></li>
        @endforeach 
    </ul>
      </div>
{{--  the loai  --}}
<div class="col-4">
      @include('pages/category')
</div>
  </div>
  <div style="padding-top: 10px">
  {{ $chapter->links() }}
</div>
  

@endsection
