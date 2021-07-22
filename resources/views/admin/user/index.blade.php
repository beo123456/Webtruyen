@extends('admin.layout.layout')
@section('title','Danh Sách Quản Trị Viên')
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
                
                <div class="card-header">Danh Sách Quản Trị Viên</div>
                 <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Level</th>
                        <th scope="col">Quản Lý</th>
                      </tr>
                    </thead>
                    <tbody>
@foreach($user as $key => $value)
                      <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $value['name'] }}</td>
                        <td>{{ $value['email'] }}</td>
@if($value['level'] == 1)
                        <td>Admin</td>
@else
                        <td>Manager</td>
@endif
                        <td>
                            <a href="{{ route('EditUser',['id'=>$value['id']]) }}" class="btn btn-primary">Sửa</a>
                            <form method="get" action="{{ Route('DestroyUser',['id'=>$value['id']]) }}">
                                @csrf
                                <button onclick="return confirm('Bạn muốn xóa user này?')" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                      </tr>
@endforeach
                    </tbody>
                  </table>

            </div>
        </div>
    </div>
    {{--  {{ $category->links() }}  --}}
</div>
@endsection

