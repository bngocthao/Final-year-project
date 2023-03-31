<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;
class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role_id != '1') {
            Auth::logout();
            Alert::error('Error', 'Unsuitable username or password!');
            return redirect()->route('login')->with('Error', 'Unsuitable username or password!');;
        }else
            return $next($request);
    }
}
