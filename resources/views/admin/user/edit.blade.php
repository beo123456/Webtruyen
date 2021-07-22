@extends('admin.layout.layout')
@section('title','Cập Nhật Quản Trị Viên')
@section('content')
<div class="container">

  <div class="card-body">
   

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="text-align: center" class="card-header">Cập Nhật Quản Trị Viên</div>
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
                          <input type="text" class="form-control" name="name" value="{{ $user->name }}" >
            </div>
                     {{--  check input  --}}
                     {!! ShowErrors($errors,'email') !!}
            <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" name="email" class="form-control" value="{{ $user->email }}">
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
                              @if($user['level'] == 1)
                            <option value="1" selected>Admin</option>
                            <option value="2">Manager</option>
                            @else
                            <option value="1" >Admin</option>
                            <option value="2" selected>Manager</option>
                            @endif
                          </select>
            </div>
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </form>
                
                 </div>
            </div>


        </div>
    </div>
</div>
@endsection

