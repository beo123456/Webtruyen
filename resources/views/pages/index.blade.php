    @extends('../layout')
    @section('title','Trang Chủ')
    @section('content')


    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Trang Chủ</li>
      </ol>
  </nav>
  
  <div>
  <form class="form-inline my-2 my-lg-0" method="get" action="search">
    @csrf
    <input class="form-control mr-sm-2" type="search" name="keyword"  placeholder="Tìm Kiếm Truyện, Tác Giả" aria-label="Tìm Kiếm">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Xác Nhận</button>
  </form>
  </div>
  <hr/>
 
{{--  truyen noi bat  --}}
<h4><span class="text-success">Truyện Nổi Bật</span></h4>

<hr/>
  <div class="container">
    <div class="row">

      @foreach($featured as $value)
      <div class="col-md-2">
        <a href="{{ route('DetailStory',['slug'=>$value->slug]) }}">
        <div class="mb-2 box-shadow">
          <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 300px; width: 100%; display: block;"
          src="public/backend/image/{{ $value['image'] }}" data-holder-rendered="true">
            <h5>{{ $value['name'] }}</h5>

        </div>
        </a>
      </div>
      @endforeach


    </div>
  </div>


<br>
    {{--  truyện mới  --}}
<h4><span class="text-success">Truyện Mới</span></h4>
<hr/>
    <div class="container">
      <div class="row">
        <div class="col-8">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">Tên Truyện</th>
                <th scope="col">Thể Loại</th>
              </tr>
            </thead>
            <tbody>
              @foreach( $story as $value2)
              <tr>
               <td><a style="color: black" href="{{ route('DetailStory',['slug'=>$value2->slug]) }}">{{ $value2['name'] }}</a></td>
                <td>{{ $value2->Category_Foreign->name }}</td>
              </tr>
              @endforeach
            
            </tbody>
          </table>
        </div>
        {{--  category  --}}
        <div class="col-4">
     @include('pages/category')
        </div>
            </div>
    </div>

   
      @endsection
