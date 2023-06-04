<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\RoleService;
class UnitsController extends Controller
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
        $id = Auth::user();
        $user = User::find($id);
        $user->name = $user[0]['name'];
        // lấy tên trưởng unit,bị lỗi là sau khi xóa trưởng unit nó sẽ k hiển thị
        $units = Unit::select("units.id", "units.name", "units.level", "users.name as username")
                    ->leftjoin("users", "users.id", "=", "units.head_of_unit_id")
                    ->get()->toArray();
        $context = [
            'units' => $units,
            'user' => $user,
            'role' => $role,
        ];
        return view('admin.manage_units.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role =  $this->roleService->inden_role();
        $unit_code = rand(0,999999);
        $id = Auth::user();
        $user = User::find($id);
        $user->name = $user[0]['name'];
        $users = User::all();
        $context = [
            'user' => $user,
            'users' => $users,
            'unit_code' => $unit_code,
            'role' => $role
        ];
        return view('admin.manage_units.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $result = Unit::create($request->all());
            if($result){
                return redirect()->intended('/admin/units')->with('success', 'Tạo thành công');
            }else{
                return redirect()->intended('/admin/units')->with('error', 'Có lỗi xảy ra khi tạo');
            }
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->intended('/admin/units')->with('alert', 'Tên đơn vị không được trùng');
            }
        }

        return redirect()->to('admin/units');
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
        $unit = Unit::find($id);
        $users = User::all();
        $role =  $this->roleService->inden_role();
        $context = [
            'unit' => $unit,
            'users' => $users,
            'role' => $role,
        ];
        return view('admin.manage_units.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $unit = Unit::find($id);
        if(auth()->user()->can('update', $unit)) {
            $update = Unit::find($id)->update($request->all());
            if ($update) {
                return redirect()->intended('/admin/units')->with('success', 'Cập nhật thành công');
            } else {
                return redirect()->intended('/admin/units')->with('error', 'Có lỗi xảy ra khi cập nhật');
            }
        }
        return redirect()->to('/admin/units');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Unit::find($id)->delete();
        if($delete){
            return redirect()->intended('/admin/units')->with('alert', 'Xoóa thành công');
        }
        else{
            return redirect()->intended('/admin/units')->with('error', 'Có lỗi xảy ra khi xóa');
        }
    }
}
