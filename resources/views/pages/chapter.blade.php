@extends('../layout')
@foreach($chapter as $value)

@section('title',"$value->title")
@section('content')
   <style>
       .infortruyen{
           list-style: none;
       }
   </style>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('Home') }}">Trang Chủ</a></li>
    @foreach($story as $value_story)
    @if($value['story_id'] == $value_story['id'])
      <li class="breadcrumb-item"><a href="{{ route('DetailStory',['slug'=>$value_story['slug']]) }}">{{ $value_story['name'] }}</a></li>
      @endif
      @endforeach
      <li class="breadcrumb-item active" aria-current="page">{{ $value->title }}</li>
    </ol>
</nav>

<div class="container">
    <div style="text-align: center"><a href="{{ route('DetailStory',['slug'=>$value->Story_Foreign->slug]) }}">{{ $value->Story_Foreign->name }}</a></div>
    <div style="text-align: center" class="text-success">{{ $value->title }}</div>
    @endforeach


    {{--  chapter list  --}}
<div style="text-align: center">

    <select name="" class="select-chapter" id="">
        @foreach($all_chapter as $value2)
        @if($value->slug == $value2->slug) 
        <option value="$value->id" selected>{{ $value->title }}</option> 
        @else
        @if($value2->story_id == $value->Story_Foreign->id)
      <option value="{{ url('chapter-detail',['slug'=>$value2['slug']]) }}">{{ $value2->title }}</option>
        @endif
        @endif
        @endforeach
    </select>
</div>


{{--  content  --}}
    <p style="text-align: justify">    {!! $value->content !!}
    </p>

    {{--  chapter list  --}}
<div style="text-align: center">

    <select name="" class="select-chapter" id="">
        @foreach($all_chapter as $value2)
        @if($value->slug == $value2->slug) 
        <option value="$value->id" selected>{{ $value->title }}</option> 
        @else
        @if($value2->story_id == $value->Story_Foreign->id)
      <option value="{{ url('chapter-detail',['slug'=>$value2['slug']]) }}">{{ $value2->title }}</option>
        @endif
        @endif
        @endforeach
    </select>

</div>

</div>
@endsection


