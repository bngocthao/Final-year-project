<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\passwordNotify;

class ClientAuth extends Controller
{
    function index(){
        return view('client.account.login');
    }

    function registration(){
        return view('client.account.create');
    }

    function register(Request $request){
        //validate
        $request->validate([
            'email' => 'unique',
        ],[
            'email.unique' => 'Account already exist'
        ]);
        //rand & băm pwd, check đúng email trường k, tạo tài khoản thành công->gửi mail
        if (str_contains($request->email, 'student.ctu.edu.vn')) {
            $randomString = Str::random(8);
            $passHash = Hash::make($randomString);
            $usercode = $request->email;
            $usercode = strtok($usercode, '@');
//            dd(password_verify($randomString, $passHash));
            $result = User::create([
                'user_code' => $usercode,
                'email' => $request->email,
                'password' => $passHash,
                'role_id' => '5'
            ]);
            if ($result){
                $MailData = [
                    'title' => 'Here is yours password',
                    'body' => 'Do not share it with anybody.',
                    'password' => $randomString
                ];

                Mail::to($request->email)->send(new passwordNotify($MailData));

                return redirect()->route('user.getLogin')->with('message','Account have been create, please check yours email');
            }else {
                return redirect()->back()->with('error','Sorry, something went wrong');
            }
        }
            return redirect()->back()->with('error','Insufficient email');
    }
}
