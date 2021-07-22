    <h4 class="text-success">Thể Loại</h4>
    <div class="row">
      @foreach($all_category as $value)
    <div class="col-6"><a style="color: black" href="{{ route('Category',['slug'=>$value['slug']]) }}">{{ $value['name'] }}</a></div>
    @endforeach
    </div>
