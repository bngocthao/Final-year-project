<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Console\View\Components\Alert;

class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);
        $users = User::all();
        $majors = Major::all();
        $context = [
            'users' => $users,
            'majors' => $majors,
            'user' => $user,
        ];
        return view('admin.manage_majors.index',$context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $major_code = rand(0,999999);
        $id = Auth::id();
        $user = User::find($id);
        $majors = Major::all();
        $units = Unit::all();
        $context = [  
            'user' => $user,
            'major_code' => $major_code,
            'majors' => $majors,
            'units' => $units,
        ];
        return view('majors.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
