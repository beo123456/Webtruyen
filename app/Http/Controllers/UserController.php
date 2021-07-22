<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function Index(){
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }

    //// create
    public function Create(){
        return view('admin.user.create');
    }

    //// store
    public function Store(request $request){
        $data = $request->validate(
            ["name"=>"required",
                "email"=>"required|email|unique:users,email",
                "password"=>"required|min:6"
            ],
            [
                "name.required"=>"Bạn chưa nhập Tên",
                "email.required"=>"Bạn chưa nhập Email",
                "email.email"=>"Sai định dạng Email",
                "email.unique"=>"Email đã tồn tại, hãy nhập Email khác",
                "password.required"=>"Bạn chưa nhập mật khẩu",
                'password.min'=>"Mật Khẩu cần ít nhất 6 ký tự"
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        // dd($user);
        $user->save();
        return redirect()->back()->with('message','Bạn đã thêm quản trị viên thành công');
    }

    ////edit
    public function Edit($id){
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }
    ////update
    public function Update(request $request, $id){
        $data = $request->validate(
            ["name"=>"required",
                "email"=>"required|email|unique:users,email,$id",
                "password"=>"required|min:6"
            ],
            [
                "name.required"=>"Bạn chưa nhập Tên",
                "email.required"=>"Bạn chưa nhập Email",
                "email.email"=>"Sai định dạng Email",
                "email.unique"=>"Email đã tồn tại, hãy nhập Email khác",
                "password.required"=>"Bạn chưa nhập mật khẩu",
                'password.min'=>"Mật Khẩu cần ít nhất 6 ký tự"
            ]
        );
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        // dd($user);
        $user->save();
        return redirect()->back()->with('message','Bạn đã cập nhật quản trị viên thành công');
    }

    //// destroy
    public function Destroy($id){
        User::destroy($id);
        return redirect()->back()->with('message','Bạn đã xóa quản trị viên thành công');
    }
}
