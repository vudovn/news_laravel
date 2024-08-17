<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoginAdminMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return $next($request);
        }

        if (Auth::check() && Auth::user()->role == 2 && Auth::user()->status == 'on') {
            return redirect()->route('admin.dashboard');
        } 
        
        if(Auth::user()->role == 1 ) {
            Auth::logout(); //Đăng xuất
            toastr()->success('adu hacker');
            return redirect()->route('admin.login.index');
        }

        if(Auth::user()->status == 2) {
            Auth::logout(); //Đăng xuất
            toastr()->success('Tài khoản đã bị chặn');
            return redirect()->route('admin.login.index');
        }
    }
}
