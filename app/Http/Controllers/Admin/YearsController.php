<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class YearsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user();
        $user = User::find($id);
        $user->name = $user[0]['name'];
        $years = Year::all();
        $context = [
            'user' => $user,
            'years' => $years
        ];
        return view('admin.manage_years.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = Auth::user();
        $user = User::find($id);
        $user->name = $user[0]['name'];
        $context = [
            'user' => $user,
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
            Alert::success('Successfully created');
        }else{
            Alert::warning('Sorry, something went wrong');
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
        $context = [
            'user' => $user,
            'year' => $year
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
            Alert::success('Successfully updated');
        }else{
            Alert::warning('Sorry, something went wrong');
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
            Alert::success('Successfully deleted');
        }
        else{
            Alert::error('Sorry, something went wrong');
        }
//        return redirect()->route('home');
        return redirect()->back();
    }
}
