<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\major_subject;
use App\Models\Subject;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\RoleService;

class SubjectsController extends Controller
{
    // Inject the service into the controller.
    protected $roleService;
    public function __construct(RoleService $roleService)
    {
        //kb ng cái services luôn
        $this->roleService = $roleService;
    }
    public function index()
    {
        $role =  $this->roleService->inden_role();
        $users = User::all();
        $id = Auth::user();
        $user = User::find($id);
        $majors = Major::all();
        $subjects = Subject::all();
        $user->name = $user[0]['name'];
        $context = [
            'user' => $user,
            'majors' => $majors,
            'subjects' => $subjects,
            'users' => $users,
            'role' => $role
        ];
        return view('admin.manage_subjects.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role =  $this->roleService->inden_role();
        $id = Auth::user();
        $user = User::find($id);
        $majors = Major::all();
        $user->name = $user[0]['name'];
        $context = [
            'majors' => $majors,
            'user' => $user,
            'role' => $role
        ];
        return view('admin.manage_subjects.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $result = Subject::create($request->all());
            if($result){
                return redirect()->intended('/admin/subjects')->with('success', 'Tạo thành công');
            }else{
                return redirect()->intended('/admin/subjects')->with('error', 'Có lỗi xảy ra khi tạo');
            }
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->intended('/admin/subjects')->with('error', 'Trùng tên hoặc mã học phần');
            }
        }

        return redirect()->to('admin/subjects');
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
        $subject = Subject::find($id);
        $id = Auth::user();
        $user = User::find($id);
        $user->name = $user[0]['name'];
        $role =  $this->roleService->inden_role();
        $context = [
            'subject' => $subject,
            'user' => $user,
            'role' => $role
        ];
        return view('admin.manage_subjects.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Subject::find($id)->update($request->all());
        if($update){
            return redirect()->intended('/admin/subjects')->with('success', 'Cập nhật thành công');
        }else{
            return redirect()->intended('/admin/subjects')->with('error', 'Xảy ra lỗi khi cập nhật');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Subject::find($id)->delete();
        if($delete){
            return redirect()->intended('/admin/subjects')->with('alert', 'Xóa thành công');
        }
        else{
            return redirect()->intended('/admin/subjects')->with('error', 'Xảy ra lỗi khi xóa');
        }
    }
}
