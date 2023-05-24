<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\UserRole;
use Closure;
//use DebugBar\DebugBar;
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
        // check ng dùng đã đn chưa
        $val_role = UserRole::find(Auth::user()->id);
        if (Auth::check() && $val_role['role_id'] == '1') {
            return $next($request);
        }else
            Alert::error('Error', 'Tài khoản hoặc mật khẩu không đúng!');
            Auth::logout();
            return redirect()->route('login')->with('Error', 'Tài khoản hoặc mật khẩu không đúng!');
    }
}
