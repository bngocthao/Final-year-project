<?php

namespace App\Http\Controllers\Admin;
use App\Models\Semester;
use App\Models\Unit;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\PostponeApplication;
use App\Models\Subject;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mail\ClientMail;
use Illuminate\Support\Facades\DB;
use App\Providers\AppServiceProvider;
use App\Services\RoleService;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use function Webmozart\Assert\Tests\StaticAnalysis\length;

class PostponeApplicationsController extends Controller
{
    // Inject the service into the controller.
    protected $roleService;
    public function __construct(RoleService $roleService)
    {
        //kb ng cái services luôn
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function getUpdateGrade($app)
    {
        // loop through each application
        // find the one that oudate 1 year
        // the date has to be >= the updated date += 1 day
        // update data into F
        foreach ($app as $a) {
            $a->i_result_date = \Illuminate\Support\Carbon::parse($a->i_result_date);
            $a->i_result_date = $a->i_result_date->addYear();
            if (($a->i_result_date)->isPast() && ($a->mark == null)){
                $a->result = 'F';
                $a->save();
            }
        }
    }
    public function filter_index(Request $request)
    {
        $id = Auth::id();
        $user = Auth::user();
        $role =  $this->roleService->inden_role();

//        $post_query = PostponeApplication::query();

        $search_param = $request->query('q');

        if($search_param) {
            $user_query = User::where('name', 'like', "%$search_param%")->get();
        }
        $users_ids = [];
        foreach ($user_query as $u){
            $users_ids[] = $u['id'];
        }

        // if there is more than one user, for each user found, get all user's post
        if(count($user_query) > 1){
            $users_post = PostponeApplication::whereIn('user_id', $users_ids)->get();
            $app = $users_post;
        }else {
            $posts_found = PostponeApplication::where('user_id', $user_query[0]['id'])
                ->orderBy('created_at', 'desc')->get();
            $app = $posts_found;
        }

        $context = [
            'user' => $user,
            'app' => $app,
            'role' => $role
        ];


        return view('admin.manage_forms.index', $context);
    }


    public function index()
    {
        $id = Auth::id();
        $user = Auth::user();
        $role =  $this->roleService->inden_role();
        if ($role == '2'){
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
                if ($usr->majors == null) continue;
                if ($usr->majors->unit_id == $unit_id && in_array($usr['id'], $teach_ids)){
                    $teach_belong_to_same_unit[] = $usr['id'];
                }
            }
            // find those application that have the $teach_belong_to_same_unit and teach_status = 1
            $app = PostponeApplication::whereIn('teach_id', $teach_belong_to_same_unit)->
            where('teach_status', '1')->where('dean_status', '1')->orderBy('created_at','desc')->get();
            $this->getUpdateGrade($app);
            $context = [
                'user' => $user,
                'app' => $app,
                'role' => $role
            ];
        }elseif ($role == '3'){
            // -- Those professor that have the same unit -- //
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
            $teach_belong_to_same_unit = [];;
            foreach ($users as $usr){
                if ($usr->majors == null) continue;
                if ($usr->majors->unit_id == $unit_id && in_array($usr['id'], $teach_ids)){
                    $teach_belong_to_same_unit[] = $usr['id'];
                }
            }
            // find those application that have the $teach_belong_to_same_unit and teach_status = 1
            $app = PostponeApplication::whereIn('teach_id', $teach_belong_to_same_unit)
                ->where('teach_status', '1')->orderBy('created_at','desc')->get();
            $this->getUpdateGrade($app);
            $context = [
                'user' => $user,
                'app' => $app,
                'role' => $role
            ];
        }elseif ($role == '4'){
            // app return student sent for professor
            $app = PostponeApplication::where('teach_id',$id)->orderBy('created_at','desc')->get();
            // appl will contain those from the same major + have been approve by prof
//            $app = PostponeApplication::where('major_id', $loginEmail->major_id)
//                ->where('teach_id', '!=', $loginEmail->id)->where('teach_status', '1')->get();
//            $this->getUpdateGrade($app1);
            $this->getUpdateGrade($app);
            $context = [
                'user' => $user,
                'app' => $app,
                'role' => $role,
            ];
        }
        else {
            // first: get all the application
            $app = PostponeApplication::all()->orderBy('created_at','desc');
            // sv chỉ được thấy đơn của mình
            // Giảng viên chỉ được thấy dơn gởi cho mình
            // unit chỉ được thấy đơn của major thuộc mìn
            $id = Auth::user();
            $user = User::find($id);
            $user->name = $user[0]['name'];
            $context = [
                'user' => $user,
                'app' => $app,
                'role' => $role,
            ];
            $this->getUpdateGrade($app);
        }
        // -- get student name --//
//        $users = User::query()
//            ->when(request('search'), function ($query) {
//                $query->where('');
//            });
        return view('admin.manage_forms.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $lastsem = date('Y', strtotime('-1 year')).'-'.date("Y");
        // $thissem = date("Y").'-'.date('Y', strtotime('+1 year'));
        $id = Auth::id();
        $user = User::find($id);
        $users = User::all();
        $majors = Major::all();
        $subjects = Subject::all();
        $teach = User::select('id', 'name', 'email')->where('role_id','3')->get();
        $years = Year::all();
        $context = [
            'majors' => $majors,
            'user' => $user,
            'users' => $users,
            'subjects' => $subjects,
            'teach' => $teach,
            'years' => $years,
            'id' => $id,
        ];
        return view('admin.manage_applications.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        $result = PostponeApplication::create($request->all());
        if($result){
            $id = Auth::id();
            $user = User::find($id);
            $usr = User::where('id','=', $request->teach_id)->get();
            // $teach_email = User::where('id','=', $request->teach_id)->get('email');
            $teach_id = $request->teach_id;
            $teach = User::find($teach_id);
            $teach_email = User::where('id', $teach_id)->pluck('email')->toArray();
            // Mail::to($teach_email)->send(new ClientMail('NEW POSTPONE APPLICATION'));
            Mail::send('mail.layout_mail', compact('teach'), function($message) use ($teach_email, $user) {
                // $id = Auth::id();
                // $user = User::find($id);
                // $teach_email = User::where('id', $user->teach_id)->get();
                // $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
                $message->to($teach_email, $user)->subject
                   ('Thông báo về đơn xin điểm i');
                //    link sẽ nằm trên đây
                $message->from($user->email,$user->name);
             });
             echo "Email Sent with attachment. Check your inbox.";
        }
        return redirect()->intended('/admin/postponse_apps')->with('success', 'Thêm mới thành công');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $appli = PostponeApplication::find($id);
        $id = Auth::user();
        $role = $id->roles[0]['id'];
        $user = User::find($id);
        $user->name = $user[0]['name'];
        $subjects = Subject::all();
        $semesters = Semester::all();
        $years = Year::all();

//        $teach_list = User::select('id', 'name', 'email')->where('role_id','3')->get();
        $context = [
            'apply' => $appli,
            'user' => $user,
            'subjects' => $subjects,
            'semesters' => $semesters,
            'years' => $years,
            'role' => $role,
//            'teach_list' => $teach_list,
        ];
        return view('admin.manage_forms.edit', $context);
    }

    public function edit_mark(string $id)
    {
        $apply = PostponeApplication::find($id);
        $id = Auth::id();
        $user = User::find($id);
        $sub = Subject::where('id', $apply->subject_id)->get('name');
        $sub = $sub[0]['name'];
        // get month
        $date = Carbon::now();
        $month = $date->format('m');
        $month = intval($month);

        if($month >= 8 && $month <= 12){
            $sem = 1;
        }
        // Học kỳ III bắt đầu từ giữa tháng 5 đến cuối tháng 6
        elseif($month >= 1 && $month <= 5){
            $sem = 2;
        }else{
            $sem = '3';
        }

        $all_years = Year::all();
        $years = $date->format('y');
        $years_avai = [];

        foreach ($all_years as $y){
            if(strpos($y->name, $years)){
                $years_avai[] = $y;
            }
        }

        $major = Major::find($apply->major_id);
        $unit_id = $major->unit_id;
        $unit = Unit::find($unit_id);
        $head_of_unit = User::where('id', $unit->head_of_unit_id)->get();
        $head_of_unit_name = $head_of_unit[0]['name'];
        $role = $this->roleService->inden_role();
        $context = [
            'apply' => $apply,
            'user' => $user,
            'sub' => $sub,
            'marked_years' => $years_avai,
            'marked_sem' => $sem,
            'role' => $role,
            'head_of_unit_name' => $head_of_unit_name,
        ];
        return view('admin.manage_forms.edit_mark', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->headmaster_status == '1'){
            $app = PostponeApplication::find($id)->update(['result' => '1']);
        }
        // Save the date student have an i from professor
        if($request->result == '1' || $request->headmaster_status == '1'){
            $i_result_date = Carbon::today();
            $date = PostponeApplication::find($id)
                ->update(['i_result_date'=>$i_result_date]);
        }
        $update = PostponeApplication::find($request->id)->update($request->all());
        if($update){
//            Alert::success('Xóa thành công');
//            alert()->success('It worked!', 'The form was submitted');
            return redirect()->intended('/admin/postponse_apps')->with('success', 'Cập nhật thành công');
        }
        else{
            return redirect()->intended('/admin/postponse_apps')->with('error', 'Có lỗi xảy ra, cập nhật thất bại');
        }
//        return Redirect::to($request->request->get('http_referrer'));
//        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = PostponeApplication::find($id)->delete();
        if($delete){
            return redirect()->intended('/admin/postponse_apps')->with('alert', 'Xóa thành công');

        }
        else{
            return redirect()->intended('/admin/postponse_apps')->with('error', 'Có lỗi xảy ra khi xóa');

        }
//        return redirect()->back();
    }
}
