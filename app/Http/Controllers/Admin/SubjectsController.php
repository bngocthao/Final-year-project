<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Subject;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user();
        $user = User::find($id);
        $context = [
            'user' => $user,
        ];
        return view('admin.manage_subjects.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = Auth::user();
        $user = User::find($id);
        $majors = Major::all();
        // $id = abs( crc32( uniqid() ) );
        $context = [
            'majors' => $majors,
            'user' => $user,
            // 'id' => $id,
        ];
        return view('admin.manage_subjects.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add = Subject::create($request->all());
        // check thử xem có thể lấy môn học thông qua ngành đc không
        $majors = Major::find($request->major_id);
        $sub = $majors->subjects()->attach($request->id);
        if($add){
            Alert()->success('Successfully added');
        }
        else{
            Alert()->error('There was an error creating the subject');
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
