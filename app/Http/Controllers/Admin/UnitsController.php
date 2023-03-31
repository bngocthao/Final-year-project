<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        ];
        return view('admin.manage_units.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unit_code = rand(0,999999);
        $id = Auth::user();
        $user = User::find($id);
        $user->name = $user[0]['name'];
        $users = User::all();
        $context = [
            'user' => $user,
            'users' => $users,
            'unit_code' => $unit_code
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
                Alert::success('Successfully created');
            }else{
                Alert::warning('Sorry, something went wrong');
            }
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Alert::error('Error', 'Dupplicate unit name!');
                return redirect()->back();
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
        $context = [
            'unit' => $unit,
            'users' => $users,
        ];
        return view('admin.manage_units.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $unit = Unit::find($id);
        if(\auth()->user()->can('update', $unit)) {
            $update = Unit::find($id)->update($request->all());
            if ($update) {
                Alert::success('Successfully updated');
            } else {
                Alert::warning('Sorry, something went wrong');
            }
            return redirect()->to('admin/units');
        }
        Alert::warning('Sorry, you don not have enough permission');
        return redirect()->to('admin/units');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Unit::find($id)->delete();
        if($delete){
            Alert::success('Successfully deleted');
        }
        else{
            Alert::error('Sorry, something went wrong');
        }
//        return redirect()->route('home');
        return redirect()->to('admin/units');
    }
}
