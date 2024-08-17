<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (Auth::check()) {
            $user = Auth::user();
            // Kiểm tra vai trò và trạng thái của người dùng
            if ($user->status == 'on') {
                return $next($request);
            } else if ($user->role == 0) {
                Auth::logout(); // Đăng xuất người dùng  
                toastr()->error('Adu hacker à!');
            } else if ($user->status == 'off') {
                Auth::logout(); // Đăng xuất người dùng  
                toastr()->error('Tài khoản này đã bị chặn!');
            }
        } else {
            Auth::logout(); // Đăng xuất người dùng (nếu có)
            toastr()->error('Vui lòng đăng nhập để sử dụng!');
        }

        return redirect()->route('login');
    }
}