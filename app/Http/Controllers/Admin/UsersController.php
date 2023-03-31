<?php
namespace App\Models;
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);
        $users = User::all();
        $context = [
            'users' => $users,
            'user' => $user,
        ];
        return view('admin.manage_users.index',$context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = Auth::id();
        $user = User::find($id);
        $majors = Major::all();
        $roles = Role::all();
        $context = [
            'majors' => $majors,
            'roles' => $roles,
            'user' => $user,
        ];
        return view('admin.manage_users.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->password = Hash::make($request->password);
            $result = User::create($request->all());
//            $result = User::create([
//                'user_code' => $request->user_code,
//                'name' => $request->name,
//                'email' => $request->email,
//                'password' => Hash::make($request->password),
//                'major_id' => $request->major_id,
//                'role_id' => $request->id,
////                'permission' => $request->permission,
//            ]);
            if($result){
                Alert::success('Successfully created');
            }else{
                Alert::warning('Sorry, something went wrong');
            }
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Alert::error('Error', 'Dupplicate usercode!');
                return redirect()->back();
            }
        }
        return redirect()->to('admin/users');
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
        $e_user = User::find($id);
        $majors = Major::all();
        $units = Unit::all();
        $roles = Role::all();
        $context = [
            'user' => $user,
            'majors' => $majors,
            // 'dv_nd' => $dv_nd,
            'units' => $units,
            'roles' => $roles,
            'e_user' => $e_user
        ];
        return view ('admin.manage_users.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = User::find($id)->update($request->all());
        if($update){
            Alert::success('Successfully updated');
        }else{
            Alert::warning('Sorry, something went wrong');
        }
        return redirect()->to('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = User::find($id)->delete();
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
