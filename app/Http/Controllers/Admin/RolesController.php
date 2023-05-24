<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);
        $roles = Role::all();
        $context = [
            'roles' => $roles,
            'user' => $user,
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
        $context = [
            'user' => $user,
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
                Alert::success('Vai trò đã được tạo');
            }else{
                Alert::warning('Có lỗi xảy ra khi tạo vai trò');
            }
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Alert::error('Error', 'Trùng tên người dùng hoặc mã người dùng!');
                return redirect()->back();
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
        $role = Role::find($id);
        $context = [
            'user' => $user,
            'role' => $role
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
            Alert::success('Đã cập nhật vai trò');
        }else{
            Alert::warning('Xảy ra lỗi khi cập nhật');
        }
        return redirect()->to('admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Role::find($id)->delete();
        if($delete){
            Alert::success('Xóa thành công');
        }
        else{
            Alert::error('Xảy ra lỗi khi xóa');
        }
//        return redirect()->route('home');
        return redirect()->back();
    }
}
