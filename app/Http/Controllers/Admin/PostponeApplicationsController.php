<?php

namespace App\Http\Controllers\Admin;
use App\Models\Semester;
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

class PostponeApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Phân quyèn trong index ?
        // sv chỉ được thấy đơn của mình
        // Giảng viên chỉ được thấy dơn gởi cho mình
        // unit chỉ được thấy đơn của major thuộc mìn
            $id = Auth::user();
            $user = User::find($id);
            $user->name = $user[0]['name'];
            $app = PostponeApplication::all();
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
                   ('A NEW POSTPONE APPLICATION');
                //    link sẽ nằm trên đây
                $message->from($user->email,$user->name);
             });
             echo "Email Sent with attachment. Check your inbox.";
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
        $appli = PostponeApplication::find($id);
        $id = Auth::user();
        $user = User::find($id);
        $user->name = $user[0]['name'];
        $subjects = Subject::all();
        $semesters = Semester::all();
        $years = Year::all();
        $teach_list = User::select('id', 'name', 'email')->where('role_id','3')->get();
        $context = [
            'apply' => $appli,
            'user' => $user,
            'subjects' => $subjects,
            'semesters' => $semesters,
            'years' => $years,
            'teach_list' => $teach_list,
        ];
        return view('admin.manage_forms.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = PostponeApplication::find($id)->update($request->all());
        if($update){
            Alert::success('Successfully updated');
        }
        else{
            Alert::error('Sorry, something went wrong');
        }
//        return redirect()->route('home');
        return redirect()->back();
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
