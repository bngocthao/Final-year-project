<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\major_subject;
use App\Models\PostponeApplication;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Year;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class PostponeApplicationController extends Controller
{
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
//            if($validator->errors()->has('subject_id'))
//                Alert::error('Please fill in your subject!');
//        return redirect()
//            ->back()
//            ->withErrors($validator);
    }
        // end w validation
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
                ('A NEW POSTPONE APPLICATION');
                //    link sẽ nằm trên đây
                $message->from($user->email,$user->name);
            });
            echo "Email Sent with attachment. Check your inbox.";
            $notification = array(
                'message' => 'Post created successfully!',
                'alert-type' => 'success'
            );

        }else{
            Alert::warning('Sorry, something went wrong');
        }
        return redirect()->back()->with($notification);;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // sv chỉ được thấy đơn của mình
        // Giảng viên chỉ được thấy dơn gởi cho mình
        // unit chỉ được thấy đơn của major thuộc mìn
        $id = Auth::user();
        $user = User::find($id);
        $user->name = $user[0]['name'];
        $app = PostponeApplication::where('user_id',$user->id);
        $context = [
            'user' => $user,
            'app' => $app,
        ];
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
        // Tìm chuyên ngành của sv
        $users_major = User::where('id', $id)->get('major_id');

        // Lấy ra id của chuyên ngành dd($major[0]['id']);
        $major = Major::find($users_major);
        // Từ id chuyên ngành tìm danh sách id môn
        $subject_ids = major_subject::where('major_id',$major[0]['id'])->get();
        // với mỗi phần tử trong mảng chứa obj, lấy tên và id của subject
        $length = sizeof($subject_ids);
        $subject_ids_list = array();
        for( $i = 0; $i < $length; $i++){
            $subject_ids_list[] = $subject_ids[$i]['subject_id'];
        }
        // tìm pbj của môn học
        $subject_list = array();
        $length = sizeof($subject_ids_list);
        for( $i = 0; $i < $length; $i++){
            $subject_list[] = Subject::find($subject_ids_list[$i]);
        }
        $subjects = Subject::all();
        $years = Year::all();
        // Lấy danh sách giảng viên có cùng chuyên ngành với sinh viên
        $teach = User::select('id', 'name', 'email')->where('role_id','4')->where('major_id',$user->major_id)->get();
        $context = [
            'user' => $user,
            'users' => $users,
            'subjects' => $subjects,
            'teach' => $teach,
            'years' => $years,
            'id' => $id,
            'subject_list' => $subject_list,
        ];
        return view('client.postpone_app.create',$context);
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
                ('A NEW POSTPONE APPLICATION');
                //    link sẽ nằm trên đây
                $message->from($user->email,$user->name);
            });
            echo "Email Sent with attachment. Check your inbox.";
            Alert::success('Send success');
        }else{
            Alert::warning('Sorry, something went wrong');
        }
        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = PostponeApplication::find($id)->delete();
        if($delete){
            Alert::success('Successfully deleted');
        }
        else{
            Alert::error('Sorry, something went wrong');
        }
//        return redirect()->route('home');
        return redirect()->back();
    }
}
