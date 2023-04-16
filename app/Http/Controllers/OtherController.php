<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PostponeApplication;
use App\Models\Unit;
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
        $checkLogin = Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        if(!$checkLogin){
            return redirect()->back()->with('error','Wrong username or password');
        }
        $teacherViewCond = Auth::user()->role_id;
        // Neu dang nhap thanh cong va account la GV
        $notification = array(
            'message' => 'Login successfully!',
            'alert-type' => 'success'
        );
//        return view('client.index')->with('message','Data added Successfully');
        if($checkLogin && $teacherViewCond == 4) {
            $app = PostponeApplication::where('teach_id',Auth::user()->id)->get();
//            return redirect()->route('client.index', $context)->with($notification);
            toast('Your Post as been submited!','success','top-right');
            return view('client.index', compact('app'))->with($notification);
            // Ngược lại nếu đăng nhập thành công nhuung account la SV hay gi do ....
        //  Role 3: first: check xem user có phải head of unit hay k (role=3)
            //	second:check xem level của unit mà user là head có = 2 k
            //	third: trả về ds mayjor thuộc unit đó
            //	four:  trả về 'form đã duyệt' của 'giảng viên thuộc major'
        }elseif($checkLogin && $teacherViewCond == 3){
            // chưa check
            //  Role 3: first: check xem user có phải head of unit hay k (role=3)
            // 'Tìm đơn' có cùng major với user và 'teach status' = 1
            $app = PostponeApplication::where('major_id',Auth::user()->major_id)->where('teach_status','1')->get();
            return view('client.index', compact('app'))->with($notification);
        }elseif($checkLogin && $teacherViewCond == 2){
            // chưa check
            // 'Tìm đơn' có cùng major với user và 'teach status' = 1 vaà unit_2_status = 1
            $app = PostponeApplication::where('major_id',Auth::user()->major_id)->where('teach_status','1')->where('unit_2_status','1')->get();
            return view('client.index', compact('app'))->with($notification);
        }else
            $app = PostponeApplication::where('user_id',Auth::id())->get();
            return view('client.index', compact('app'))->with($notification);
        //  cai dong nay lam gì, phuc tap qua da, chi can AUth::user -> role_id la xong, access array lam gi
        // roi cai if ben duoi, tai sao k ket hop ca 2 cond lai, vua login xong va chec luon role
        // cau truc if/else sao khong tuan thu quy tac, mac du biet if khong can else van dc, nhung dua len server di roi chet queo
        // cai hom bua tui chi dau k lam, no clean code ma le nua, cai toast
        // return chua ki, code cu THao return ve cai route client.idex, nhung cai route do no nhan funtion o HomeController
        // Minh dang xu ly o Other Controller thi ben Home nó làm meoo gi có biến App để  mà fetch data ben kia
        // Don xem, cai Home contrller, ham clinet_index
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.getLogin');
    }

}
