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
            $app = PostponeApplication::where('user_id',$user->id)->get(); // cai nay no loi day, no dang tra ve het data trong PostApp khi user_id = id, con cai role dau thi k thay
            $context = [
                'user' => $user,
                'app' => $app,
            ];
            return view('client.index', $context);
        }else {
            return view('client/account/login');
        } // Cau truc if else khong dung quu tac, cap dau {} dau. Gia su sau nay co case 10 cai if, mà viet kieu nay nay thi loi biet cai case nao ma sua, dua len server cung chet quep
    }

}
