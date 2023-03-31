<?php

namespace App\Http\Controllers;

use App\Models\PostponeApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $id = Auth::id();
            $user = User::find($id);
            $context = [
                'user' => $user,
            ];
            return view('admin.layouts.home', $context);
        }else return view('login');
    }

    public function client_index()
    {
        if (Auth::check()) {
            $id = Auth::id();
            $user = User::find($id);
            $app = PostponeApplication::where('user_id',$user->id);
            $teach = User::where('user_role', '4');
            $context = [
                'user' => $user,
                'app' => $app,
            ];
            return view('client.index', $context);
        }else return view('client/account/login');
    }

}
