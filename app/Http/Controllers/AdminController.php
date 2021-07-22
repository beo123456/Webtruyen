<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function GetLogin(){
        // dd(bcrypt(123456));
        return view('admin.login.login');
    }

    function PostLogin(request $request){
        $data = $request->validate(
            ['email'=> 'required|email',
            'password'=> 'required|min:6'],
            [
                'email.required'=>'Hãy nhập email',
                'email.email'=>'Email sai định dạng',
                'password.required'=>'Hãy nhập password',
                'password.min'=>'Password phải có ít nhất 6 ký tự'
            ]);
            $email = $request->email;
            $password = $request->password;
            if(Auth::attempt(['email'=>$email,'password'=>$password])){
                return redirect('admin');
            }else{
                return redirect()->back()->with('message',"Sai tài khoản hoặc mật khẩu");
            } 
    }
    
    function ShowDashboard(){
        return view('admin.dashboard');
    }

    function Logout(){
        
        Auth::logout();
        return redirect('login');
    }

}
