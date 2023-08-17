<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    //    if($request->is('admin/*') || $request->is('admin')) {
    //         return redirect()->route('home');
    //     }

       
        if (Auth::check()) {
            if(Auth::user()->email > '0') {
                return $next($request);
            } else {
                return redirect()->route('admin.auth-login')->with('msg', 'Bạn cần phải đăng nhập trước!!');
            }
        } else {
            return redirect()->route('admin.auth-login')->with('msg', 'Bạn cần phải đăng nhập trước!!');
        }   
        // return $next($request);
    }
}
