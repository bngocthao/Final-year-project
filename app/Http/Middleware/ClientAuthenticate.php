<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class ClientAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        //
//        if (!Auth::check()) {
//            Auth::logout();
//            Alert::error('Error', 'Unsuitable username or password!');
//            return redirect()->route('user.getLogin')->with('Error', 'Unsuitable username or password!');;
//        }else

        if (!Auth::check())
        {
            return redirect()->route('user.getLogin');
        }
//        if(Auth::user()->roles->)
            return $next($request);
    }
}
