<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
class LoginController extends Controller
{

    public function index() { // GET[/admin/login]
        return view("admin.auth.login"); //render giao diện
    }
    
    public function doLogin(LoginRequest $request) { // POST[/admin/doLogin]

        if (Auth::attempt($request->except('_token'))) { //Đăng nhập
            return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công'); //chuyển hướng sang trang dashboard
        }

        toastr()->error('Sai tên đăng nhập hoặc mật khẩu!'); //thông báo 
        return redirect()->back(); //quay về trang login khi sai tk or mk => đăng nhập thất bại
    }

    public function doLogout() { //GET [/admin/doLogout]
        Auth::logout(); //đăng xuất
        toastr()->success('Đăng xuất thành công'); //Thông báo
        return redirect()->route('admin.login.index'); //CHuyển hướng ra trang login
    }


}
