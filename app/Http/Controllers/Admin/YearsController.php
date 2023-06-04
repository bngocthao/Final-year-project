<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\RoleService;
class YearsController extends Controller
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
        $years = Year::all();
        $context = [
            'user' => $user,
            'years' => $years,
            'role' => $role
        ];
        return view('admin.manage_years.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role =  $this->roleService->inden_role();
        $id = Auth::user();
        $user = User::find($id);
        $user->name = $user[0]['name'];
        $context = [
            'user' => $user,
            'role' => $role
        ];
        return view('admin.manage_years.create', $context);
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = Year::create($request->all());
        if($result){
            return redirect()->intended('/admin/years')->with('success', 'Tạo thành công');
        }else{
            return redirect()->intended('/admin/years')->with('error', 'Có lỗi xảy ra khi tạo');
        }

        return redirect()->to('admin/years');
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
        $year = Year::find($id);
        $id = Auth::user();
        $user = User::find($id);
        $user->name = $user[0]['name'];
        $role =  $this->roleService->inden_role();
        $context = [
            'user' => $user,
            'year' => $year,
            'role' => $role
        ];
        return view('admin.manage_years.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Year::find($id)->update($request->all());
        if($update){
            return redirect()->intended('/admin/years')->with('success', 'Cập nhật thành công');
        }else{
            return redirect()->intended('/admin/years')->with('error', 'Có lỗi xảy ra khi tạo');
        }
        return redirect()->to('admin/years');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Year::find($id)->delete();
        if($delete){
            return redirect()->intended('/admin/years')->with('alert', 'Xóa thành công');
        }
        else{
            return redirect()->intended('/admin/years')->with('error', 'Có lỗi xảy ra khi xóa');
        }
//        return redirect()->route('home');
        return redirect()->back();
    }
}
