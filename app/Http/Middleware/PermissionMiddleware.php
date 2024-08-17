<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $permission): Response
    {
        if(Auth::check() && Auth::user()->cant($permission)){
            toastr()->error('Bạn không có quyền truy cập');
            return back();
        }
        return $next($request);
    }
}
