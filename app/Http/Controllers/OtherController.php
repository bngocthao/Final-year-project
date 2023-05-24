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
            if (($a->i_result_date)->isPast()){
                $a->result = 'F';
                $a->save();
            }
        }
    }

    public function login(Request $request)
    {
        // get user info through email
        $loginEmail = User::where('email', $request->email)->first();
//        // then get that user hash pwd and compare with user input pwd
        $loginPassword = $loginEmail['password'];
        $checkLogin = password_verify($request->password, $loginPassword);
        $notification = array(
            'message' => 'Login successfully!',
            'alert-type' => 'success'
        );
        // get user role
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
        if (Auth::attempt($credentials) && in_array(5, $u_roles)) {
            $request->session()->regenerate();
            $app = PostponeApplication::where('user_id',$loginEmail->id)->get();
            $this->getUpdateGrade($app);
            return view('client.index', compact('app'))->with($notification);
        }
        // either head of unit & professor
        elseif (Auth::attempt($credentials) && array_intersect(array(3,4), $u_roles)) {
            $request->session()->regenerate();
            // app return will be the combination of those student sent &
            // from the others professor that belong to the same as this user major id
            $app1 = PostponeApplication::where('teach_id', $loginEmail->id)->get();
            // appli will contain those from the same major + have been approve by prof
            $app = PostponeApplication::where('major_id', $loginEmail->major_id)
                ->where('teach_id', '!=', $loginEmail->id)->where('teach_status', '1')->get();
            $this->getUpdateGrade($app1);
            $this->getUpdateGrade($app);
            return view('client.index', compact('app', 'app1'))->with($notification);
        }elseif(Auth::attempt($credentials) && in_array(3, $u_roles)) {
            $request->session()->regenerate();
            $app = PostponeApplication::where('professor_status',1)->get();
            $this->getUpdateGrade($app);
            return view('client.index', compact('app'))->with($notification);
        }elseif(Auth::attempt($credentials) && in_array(2, $u_roles)) {
            $request->session()->regenerate();
            $app = PostponeApplication::where('unit_2_status',1)->get();
            $this->getUpdateGrade($app);
            return view('client.index', compact('app'))->with($notification);
        }elseif(Auth::attempt($credentials) && in_array(1, $u_roles)){
            return redirect()->back()->with('error','Admin account is not allow here');
        }
        return redirect()->back()->with('error','Wrong username or password');


        // loop to check user role, thấy hay nên để dành
//        $u_role = $loginEmail->roles()->each(function ($role) {
//            echo "Role ID: $role->id was attached to user. ";
//        });

        // roi cai if ben duoi, tai sao k ket hop ca 2 cond lai, vua login xong va chec luon role
        // cau truc if/else sao khong tuan thu quy tac, mac du biet if khong can else van dc, nhung dua len server di roi chet queo
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('user.getLogin');
    }


}
