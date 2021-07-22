@extends('admin.layout.layout')
@section('title','Thêm Quản Trị Viên')
@section('content')
<div class="container">

  <div class="card-body">
   

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="text-align: center" class="card-header">Thêm Quản Trị Viên</div>
                    {{--  check session message  --}}
                    @if(session('message'))
                    <div class="text-success">{{ session('message') }}</div>
                    @endif
         

                <form method="post">
                    @csrf
                    {{--  check input  --}}
                    {!! ShowErrors($errors,'name') !!}
            <div class="form-group">
                          <label for="exampleInputEmail1">Tên Quản Trị Viên</label>
                          <input type="text" class="form-control" name="name" value="{{ old('name') }}" >
            </div>
                     {{--  check input  --}}
                     {!! ShowErrors($errors,'email') !!}
            <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
            </div>
             {{--  check input  --}}
             {!! ShowErrors($errors,'password') !!}
            <div class="form-group">
            <label for="exampleInputEmail1">Mật Khẩu</label>
            <input type="text" name="password" class="form-control">
            </div>

            <div class="form-group">
                        <label >Level</label>
                          <select name="level" class="custom-select">
                            <option value="1" >Admin</option>
                            <option value="2">Manager</option>
                          </select>
            </div>
                        <button type="submit" class="btn btn-primary">Thêm Mới</button>
                </form>
                
                 </div>
            </div>


        </div>
    </div>
</div>
@endsection

