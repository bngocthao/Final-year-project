<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\major_subject;
use App\Models\PostponeApplication;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Year;
use App\Models\Role;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Auth\Access\Gate;
use Illuminate\Routing\Redirector;
class PostponeApplicationController extends Controller
{
    // check mail blade
    public function check_mail(){
        return view('mail.layout_mail');
    }

    //send form (*****************************)
    public function post_form(Request $request)
    {
        // xử lý validation
        $validator = $request->validate([
           'subject_id' => ['required'],
            'teach_id' => ['required'],
            'semester_id' => ['required'],
            'year_id' => ['required'],
            'reason' => ['required']
        ]);

        if (!$validator) {
            return redirect()->back()->withErrors($validator);
        }

        $file = $request->file('proof');
        if ($file) {
            // cần phải có getClientOriginalName ?
            $name = $request->subject_id . time() . $file->getClientOriginalName();
            // chuyển file vào thư mục public đã đc mặc định ở config
            $file->move('client/proof', $name);
            // lưu vòa db dưới tên đường dẫn
            $request->proof = "client/proof/" . $name;

            $result = PostponeApplication::create([
                'user_id' => $request->user_id,
                'major_id' => $request->major_id,
                'subject_id' => $request->subject_id,
                'group' => $request->group,
                'teach_id' => $request->teach_id,
                'semester_id' => $request->semester_id,
                'year_id' => $request->year_id,
                'reason' => $request->reason,
                'proof' => $request->proof
            ]);
        }else {
            $result = PostponeApplication::create([
                'user_id' => $request->user_id,
                'major_id' => $request->major_id,
                'subject_id' => $request->subject_id,
                'group' => $request->group,
                'teach_id' => $request->teach_id,
                'semester_id' => $request->semester_id,
                'year_id' => $request->year_id,
                'reason' => $request->reason,
            ]);
        }

        // gởi mail
        if($result){
            $id = Auth::id();
            $user = User::find($id);
            $usr = User::where('id','=', $request->teach_id)->get();
            $teach_id = $request->teach_id;
            $teach = User::find($teach_id);
            $teach_email = User::where('id', $teach_id)->pluck('email')->toArray();
            // gởi qua view layout_mail kèm data của teach
            Mail::send('mail.layout_mail', compact('teach'), function($message) use ($teach_email, $user) {
                // $id = Auth::id();
                // $user = User::find($id);
                // $teach_email = User::where('id', $user->teach_id)->get();
                // $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
                $message->to($teach_email, $user)->subject
                ('Đơn xin hoãn thi mới');
                //    link sẽ nằm trên đây
                $message->from($user->email,$user->name);
            });
            echo "Email Sent. Check your inbox.";
            $notification = array(
                'message' => 'Đơn đã được gửi hoàn tất!',
                'alert-type' => 'success'
            );

        }else{
            $notification = array(
                'message' => 'Có lỗi xảy ra trong quá trình gửi đơn!',
                'alert-type' => 'error'
            );
        }
        toastr()->success('Đơn đã được gửi');
        return redirect()->route('index');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     *
     */
    public function create()
    {

        // chỉ dành cho sv
        $this->authorize('isStudent');
        // $lastsem = date('Y', strtotime('-1 year')).'-'.date("Y");
        // $thissem = date("Y").'-'.date('Y', strtotime('+1 year'));
        $id = Auth::id();
        $user = User::find($id);
        $users = User::all();
        // Tìm chuyên ngành của sv
        $users_major = User::where('id', $id)->get('major_id');
        $subjects = Subject::all();
        // professors list
        $profs_id_obj = UserRole::where('role_id', 4)->get('user_id');
        // get value professor id
        $profs_id = array();
        foreach ($profs_id_obj as $p){
            $profs_id[] = $p->user_id;
        }
        // with each id find proffesor
        $teach = array();
        foreach ($profs_id as $p){
            $teach[] = User::where('id', $p)->get();
        }
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

        $context = [
            'user' => $user,
            'users' => $users,
            'subjects' => $subjects,
            'teach' => $teach,
            'years' => $years_avai,
            'id' => $id,
            'subject_list' => $subjects,
            'sem' => $sem,
        ];
        return view('client.postpone_app.create',$context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('home');
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
                ('Đơn hoãn thi mới');
                //    link sẽ nằm trên đây
                $message->from($user->email,$user->name);
            });
            echo "Email Sent with attachment. Check your inbox.";
            Alert::success('Gửi thành công');
        }else{
            Alert::warning('Có lỗi xảy ra, gửi thất bại');
        }
        return redirect()->route('home');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $app = PostponeApplication::find($id);
        $id = Auth::id();
        $user = User::find($id);
        $sub = Subject::where('id', $app->subject_id)->get('name');
        $sub = $sub[0]['name'];
//        $proof = Storage::get($app->proof);
//        $proof = public_path($app->proof);
//        $app->proof = Storage::get($proof);
//        dd($app->proof);
        $context = [
            'app' => $app,
            'user' => $user,
            'sub' => $sub
        ];
        return view('client.postpone_app.show', $context);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $app = PostponeApplication::find($id);
            $context = [
                'apply' => $app,
            ];
            return view('client.postpone_app.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Save the date student have an i from professor
        if($request->result == 'i' || $request->result == 'I'){
            $i_result_date = Carbon::today();
            $date = PostponeApplication::find($id)
                ->update(['i_result_date'=>$i_result_date]);
        }
        $app = PostponeApplication::find($id)->update($request->all());
        if($app){
            return redirect()->back()->with('message', 'Đơn đã được cập nhật');
        }else
            return redirect()->back()->with('error', 'Có lỗi xảy ra, cập nhật thất bại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = PostponeApplication::find($id)->delete();
        if($delete){
            Alert::success('Xóa thành công');
        }
        else{
            Alert::error('Có lỗi xảy ra, xóa thất bại');
        }
//        return redirect()->route('home');
        return redirect()->back();
    }
}
