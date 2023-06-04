<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\RoleService;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Inject the service into the controller.
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
        $roles = Role::all();
        $role = $user->roles[0]['id'];
        $context = [
            'roles' => $roles,
            'user' => $user,
            'role' => $role,
        ];
        return view('admin.manage_roles.index',$context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = Auth::id();
        $user = User::find($id);
        $role = $user->roles[0]['id'];
        $context = [
            'user' => $user,
            'role' => $role,
        ];
        return view('admin.manage_roles.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $result = Role::create($request->all());
            if($result){
                return redirect()->intended('/admin/roles')->with('success', 'Tạo thành công');
            }else{
                return redirect()->intended('/admin/roles')->with('error', 'Có lỗi xảy ra khi tạo');
            }
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->intended('/admin/roles')->with('error', 'Trùng tên hoặc mã vai trò');
            }
        }
        return redirect()->to('admin/roles');
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
        $a_id = Auth::id();
        $user = User::find($a_id);
        $e_role = Role::find($id);
        $role =  $this->roleService->inden_role();
        $context = [
            'user' => $user,
            'role' => $role,
            'e_role' => $e_role,
        ];
        return view('admin.manage_roles.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Role::find($id)->update($request->all());
        if($update){
            return redirect()->intended('/admin/roles')->with('success', 'Cập nhật thành công');
        }else{
            return redirect()->intended('/admin/roles')->with('error', 'Xảy ra lỗi khi cập nhật');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Role::find($id)->delete();
        if($delete){
            return redirect()->intended('/admin/roles')->with('success', 'Xóa thành công');

        }
        else{
            return redirect()->intended('/admin/roles')->with('error', 'Xảy ra lỗi khi xóa');

        }
    }
}
