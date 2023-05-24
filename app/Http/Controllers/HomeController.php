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
            $total_app = PostponeApplication::count();
            $app = PostponeApplication::all();
            $waiting_app = 0;
            $accepted_app = 0;
            $denine_app = 0;
            foreach ($app as $a){
                // if there is a field tat not have status &.. -> the app is still waiting
                if (($a->teach_status == null || $a->unit_2_status == null || $a->unit_1_status == null) && $a->i_result_date == null)
                    $waiting_app += 1;
                // if there is a field all have status = 1 &.. -> the app is accepted
                elseif (($a->teach_status == '1' && $a->unit_2_status == '1' && $a->unit_1_status == '1') && $a->i_result_date != null)
                    $accepted_app += 1;
                else
                    $denine_app += 1;
            }
            $context = [
                'user' => $user,
                'total_app' => $total_app,
                'waiting_app' => $waiting_app,
                'accepted_app' => $accepted_app,
                'denine_app' => $denine_app
            ];
            return view('admin.layouts.home', $context);
        }else return view('login');
    }

    // trả về index user
//    public function client_index()
//    {
//        dd('rìa lý?');
//        if (Auth::check()) {
//            $id = Auth::id();
//            $user = User::find($id);
//            $app = PostponeApplication::where('user_id',$user->id)->get(); // cai nay no loi day, no dang tra ve het data trong PostApp khi user_id = id, con cai role dau thi k thay
//            $context = [
//                'user' => $user,
//                'app' => $app,
//            ];
//            return view('client.index', $context);
//        }else {
//            return view('client/account/login');
//        } // Cau truc if else khong dung quu tac, cap dau {} dau. Gia su sau nay co case 10 cai if, mà viet kieu nay nay thi loi biet cai case nao ma sua, dua len server cung chet quep
//    }

}
