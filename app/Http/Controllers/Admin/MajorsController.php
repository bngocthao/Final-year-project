<?php
namespace App\Http\Controllers\Admin;
use App\Models\major_subject;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use mysql_xdevapi\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use function GuzzleHttp\Promise\all;
use function Webmozart\Assert\Tests\StaticAnalysis\length;
use App\Services\RoleService;
class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $roleService;
    public function __construct(RoleService $roleService)
    {
        //kb ng cái services luôn
        $this->roleService = $roleService;
    }

    public function index()
    {

        $id = Auth::id();
        $user = User::find($id);
        $users = User::all();
        $majors = Major::all();
        $role =  $this->roleService->inden_role();
        $context = [
            'users' => $users,
            'majors' => $majors,
            'user' => $user,
            'role' => $role,
        ];
        return view('admin.manage_majors.index',$context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = Auth::id();
        $role =  $this->roleService->inden_role();
        $major_code = rand(0,999999);
        $user = User::find($id);
        $majors = Major::all();
        $units = Unit::all();
        $subjects = Subject::all();
        $context = [
            'user' => $user,
            'major_code' => $major_code,
            'majors' => $majors,
            'units' => $units,
            'subjects' => $subjects,
            'role' => $role
        ];
        return view('admin.manage_majors.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $result = Major::create($request->all());
            // Lay id moi nhat vua them
            $ids = Major::find($result->id);
            // Lay danh sach cac mon hoc can them
            $subjectList = $request->subject_id;
            // Gan mon hoc cho chuyen nganh
            $ids->subjects()->attach($subjectList);

            if($result){
                return redirect()->intended('/admin/majors')->with('success', 'Thêm mới thành công');
            }else{
                return redirect()->intended('/admin/majors')->with('error', 'Thêm mới thất bại!');
            }
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->intended('/admin/majors')->with('error', 'Mã hoặc tên ngành đã bị trùng');

            }
        }

        return redirect()->to('admin/majors');
//        return redirect()->back();
//        return redirect()->route('majors.edit', $request);
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
        $major = Major::find($id);
        $units = Unit::all();
        // lấy subject list
        $subject_ids = major_subject::where('major_id',$id)->get();
        // lấy obj ds các subject id
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
        $full_subject = Subject::all();
        $role =  $this->roleService->inden_role();
        $content = [
            'major' => $major,
            'units' => $units,
            'subject_list' => $subject_list,
            'full_subject' => $full_subject,
            'subject_ids_list' => $subject_ids_list,
            'role' => $role
        ];
        return view('admin.manage_majors.edit', $content);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update record
        if($request->subject_id == null){
            Alert::error('Error','Môn học không được trống');
            return redirect()->back();
        }
        $length = sizeof($request->subject_id);
        $major = Major::find($id);
        $ids = array();
        $major->subjects()->sync($request->subject_id);
        $update = Major::find($id)->update($request->all());
        if($update){
            return redirect()->intended('/admin/majors')->with('success', 'Cập nhật thành công');
        }
        else{
            return redirect()->intended('/admin/majors')->with('error', 'Cập nhật thất bại!');
        }
//        return redirect()->to('admin/majors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        Alert::question('Do you really want to delete?','yes','no');
        $delete = Major::find($id)->delete();
         if($delete){
             return redirect()->intended('/admin/majors')->with('alert', 'Xóa thành công');
         }
         else{
             return redirect()->intended('/admin/majors')->with('error', 'Có lỗi xảy ra khi xóa');
         }
//        return redirect()->route('home');
        return redirect()->back();
    }
}
