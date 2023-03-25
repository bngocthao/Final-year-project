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


class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $user->name = $user[0]['name'];
        $context = [
            'majors' => $majors,
            'user' => $user,
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
                Alert::success('Successfully created');
            }else{
                Alert::warning('Sorry, something went wrong');
            }
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Alert::error('Error', 'Dupplicate subject code!');
                return redirect()->back();
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
        $context = [
            'subject' => $subject,
            'user' => $user
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
            Alert::success('Successfully updated');
        }else{
            Alert::warning('Sorry, something went wrong');
        }
        return redirect()->to('admin/subjects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Subject::find($id)->delete();
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
