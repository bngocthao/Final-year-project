<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtherController extends Controller
{
    public function getLogin()
    {
        return view('client.account.login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            // alerr - tra ve trang home cua user
                $user = User::where('email', $request->email)->get();
                $context = ['user' => $user];
            return redirect()->route('client.index', $context);
        }
        else{
            // a;ert ;--
            return redirect()->route('user.getLogin');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.getLogin');
    }

}
