<?php

namespace App\Http\Controllers;

use App\Models\PostponeApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
            $role = $user->roles[0]['id'];
            $total_app = PostponeApplication::count();
            $app = PostponeApplication::all();
            $waiting_app = 0;
            $accepted_app = 0;
            $denine_app = 0;
            foreach ($app as $a){
                // if there is a field tat not have status &.. -> the app is still waiting
                if ($a->result == null)
                    $waiting_app += 1;
                // if there is a field all have status = 1 &.. -> the app is accepted
                elseif ($a->result == '1')
                    $accepted_app += 1;
                else
                    $denine_app += 1;
            }
            $context = [
                'user' => $user,
                'total_app' => $total_app,
                'waiting_app' => $waiting_app,
                'accepted_app' => $accepted_app,
                'denine_app' => $denine_app,
                'role' => $role
            ];
            return view('admin.layouts.home', $context);
        }else return view('login');
    }

}
