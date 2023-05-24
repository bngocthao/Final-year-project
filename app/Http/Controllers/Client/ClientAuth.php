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
        $emailValidate =  User::where('email', $request->email)->get();
        if ($emailValidate){
            return redirect()->back()->with('error','Tài khoản đã tồn tại!');
        }

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
                    'title' => 'Đây là mật khẩu của bạn',
                    'body' => 'Đừng chia sẽ nó với ai khác.',
                    'password' => $randomString
                ];

                Mail::to($request->email)->send(new passwordNotify($MailData));

                return redirect()->route('user.getLogin')->with('message','Tài khoản đã được tạo, hãy kiểm tra email của bạn');
            }else {
                return redirect()->back()->with('error','Xin lỗi, đã có lỗi phát sinh');
            }
        }
            return redirect()->back()->with('error','Email không hợp lệ, hãy sử dụng email của trường!');
    }
}
