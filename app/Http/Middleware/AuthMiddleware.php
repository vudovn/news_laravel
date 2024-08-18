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
            
            // Kiểm tra trạng thái của người dùng
            if ($user->status == 'on' && $user->role == 1) {
                return $next($request);
            } 
            
            if ($user->status == 'off') {
                Auth::logout(); // Đăng xuất người dùng
                toastr()->error('Tài khoản này đã bị chặn!');
                return redirect()->route('login');
            }

            // Kiểm tra vai trò và trạng thái khác
            if ($user->role == 0) {
                Auth::logout(); // Đăng xuất người dùng
                toastr()->error('Adu hacker à!');
                return redirect()->route('login');
            } 
            
        }

        // Trường hợp chưa đăng nhập
        toastr()->error('Vui lòng đăng nhập để sử dụng!');
        return redirect()->route('login');
    }
}
