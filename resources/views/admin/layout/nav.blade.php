<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('dashboard') }}">Admin<span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản Lý Thể Loại
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('CreateCategory') }}">Thêm Thể Loại</a>
                <a class="dropdown-item" href="{{ route('IndexCategory') }}">Liệt Kê Thể Loại</a>     
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản Lý Truyện
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('CreateStory') }}">Thêm Truyện</a>
                <a class="dropdown-item" href="{{ route('IndexStory') }}">Liệt Kê Truyện</a>     
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Chapter
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('CreateChapter') }}">Thêm Chapter</a>
                {{--  <a class="dropdown-item" href="{{ route('IndexChapter') }}">Liệt Kê Chapter</a>       --}}
              </div>
            </li>
@if(Auth::user()->level == 1)
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản Trị Viên
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('CreateUser') }}">Thêm Quản trị viên</a>
                <a class="dropdown-item" href="{{ route('IndexUser') }}">Danh Sách Quản Trị Viên</a>     
              </div>
            </li>
@endif

           
          </ul>

        </div>
    </nav>  
</div>
