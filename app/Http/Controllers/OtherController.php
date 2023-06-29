<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\major_subject;
use App\Models\PostponeApplication;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use function Webmozart\Assert\Tests\StaticAnalysis\length;
use Session;
use Illuminate\Support\Fluent;
use Illuminate\Support\Carbon;

class OtherController extends Controller
{
//    public function __construct()
//    {
//        $this->resetSession();
//    }

    public function getLogin()
    {
        return view('client.account.login');
    }

    public function getUpdateGrade($app)
    {
        // loop through each application
        // find the one that oudate 1 year
        // the date has to be >= the updated date += 1 day
        // update data into F
        foreach ($app as $a) {
            $a->i_result_date = Carbon::parse($a->i_result_date);
            $a->i_result_date = $a->i_result_date->addYear();
            if (($a->i_result_date)->isPast() && ($a->result == 'i' || $a->result == 'I')){
                $a->result = 'F';
                $a->save();
            }
        }
    }

    public function login(Request $request)
    {
        // get user role
        $loginEmail = User::where('email', $request->email)->first();
        $teacherViewCond = $loginEmail->roles;
        $u_roles = array();
        for($i = 0; $i < sizeof($teacherViewCond); $i++){
            // first array access to collection to get value inside each obj
            // second arr access to pivot field?
            // third arr access to key to get value
            $u_roles[] = ($teacherViewCond[$i]['pivot']['role_id']);
        };
        $credentials = $request->only('email', 'password');
        // student auth
        if (Auth::attempt($credentials) && in_array(5, $u_roles))
        {
            $request->session()->regenerate();
            toastr()->success('Đăng nhập thành công');
            return redirect()->route('index');
        }
        // professor auth
        elseif (Auth::attempt($credentials) && in_array(4, $u_roles)) {
            $request->session()->regenerate();
            return redirect()->route('home');
            // app return student sent for professor
            $app = PostponeApplication::where('teach_id', $loginEmail->id)->get();
            // appl will contain those from the same major + have been approve by prof
//            $app = PostponeApplication::where('major_id', $loginEmail->major_id)
//                ->where('teach_id', '!=', $loginEmail->id)->where('teach_status', '1')->get();
//            $this->getUpdateGrade($app1);
            $this->getUpdateGrade($app);
            return view('client.index', compact('app'));
        }
        // Dean
        elseif(Auth::attempt($credentials) && in_array(3, $u_roles)) {
            $request->session()->regenerate();
            return redirect()->route('home');
            // -- Those professor that have the same unit -- //
            // Get the current user
            $user = Auth::user();
            // Get unit
            $unit_id = $user->majors->unit_id;
            // get professor_id who agree forms
            $avai_forms = PostponeApplication::where('teach_status', '1')->get();
            $teach_ids = [];
            foreach ($avai_forms as $av){
                $teach_ids[] = $av['teach_id'];
            }
            $teach_ids = array_unique($teach_ids);
            //-- filter to find if there is any professor that have the same unit_id with user --
            // get users have teach_ids and the same unit with user
            $users = User::all();
            $teach_belong_to_same_unit = [];
            foreach ($users as $usr){
                if ($usr->majors->unit_id == $unit_id && in_array($usr['id'], $teach_ids)){
                    $teach_belong_to_same_unit[] = $usr['id'];
                }
            }
            // find those application that have the $teach_belong_to_same_unit and teach_status = 1
            $app = PostponeApplication::whereIn('teach_id', $teach_belong_to_same_unit)
                    ->where('teach_status', '1')->get();
            $this->getUpdateGrade($app);
//            return view('client.index', compact('app'))->with($notification);
        }elseif(Auth::attempt($credentials) && in_array(2, $u_roles)) {
            $request->session()->regenerate();
//            $app = PostponeApplication::where('dean_status',1)->get();
            return redirect()->route('home');
            // Get the current user
            $user = Auth::user();
            // Get unit
            $unit_id = $user->majors->unit_id;
            // get professor_id who agree forms
            $avai_forms = PostponeApplication::where('teach_status', '1')->get();
            $teach_ids = [];
            foreach ($avai_forms as $av){
                $teach_ids[] = $av['teach_id'];
            }
            $teach_ids = array_unique($teach_ids);
            //-- filter to find if there is any professor that have the same unit_id with user --
            // get users have teach_ids and the same unit with user
            $users = User::all();
            $teach_belong_to_same_unit = [];
            foreach ($users as $usr){
                if ($usr->majors->unit_id == $unit_id && in_array($usr['id'], $teach_ids)){
                    $teach_belong_to_same_unit[] = $usr['id'];
                }
            }
            // find those application that have the $teach_belong_to_same_unit and teach_status = 1
            $app = PostponeApplication::whereIn('teach_id', $teach_belong_to_same_unit)->
            where('teach_status', '1')->where('dean_status', '1')->get();
            $this->getUpdateGrade($app);
//            return view('client.index', compact('app'))->with($notification);
        }else{
            $app = PostponeApplication::all();
            return redirect()->route('home');
        }
        toastr()->success('Đăng nhập thành công');
        return view('client.index', compact('app'));
//        return redirect()->back()->with('error','Wrong username or password');


        // loop to check user role, thấy hay nên để dành
//        $u_role = $loginEmail->roles()->each(function ($role) {
//            echo "Role ID: $role->id was attached to user. ";
//        });

        // roi cai if ben duoi, tai sao k ket hop ca 2 cond lai, vua login xong va chec luon role
        // cau truc if/else sao khong tuan thu quy tac, mac du biet if khong can else van dc, nhung dua len server di roi chet queo
    }

//    public function login(Request $request)
//    {
//        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
//        {
//            toastr()->success('Đăng nhập thành công');
//            return redirect()->route('user.index_user');
//
//        }else{
//            toastr()->error('Sai tên tài khoản hoặc mật khẩu');
//            return view('client.account.login');
//        }
//    }

    public function resetSession(Request $request)
    {
        $request->session()->regenerate();
    }
    public function student_index(Request $request)
    {
        return view('client.index');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('user.getLogin');
    }

//    public function update_mark(Request $request, string $id)
//    {
//        dd($id);
//        $app = PostponeApplication::find($id)->update($request->all());
//        if($app){
//            return redirect()->intended('/admin/postponse_apps')->with('message', 'Đơn đã được cập nhật');
//        }else
//            return redirect()->intended('/admin/postponse_apps')->with('error', 'Có lỗi xảy ra, cập nhật thất bại');
//    }

}
