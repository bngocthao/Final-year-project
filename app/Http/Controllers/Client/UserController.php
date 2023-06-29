<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\PostponeApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUpdateGrade($app)
    {
        // loop through each application
        // find the one that oudate 1 year
        // the date has to be >= the updated date += 1 day
        // update data into F
        foreach ($app as $a) {
            $a->i_result_date = Carbon::parse($a->i_result_date);
            $a->i_result_date = $a->i_result_date->addYear();
            if (($a->i_result_date)->isPast() && ($a->result == 'i' || $a->result == 'I')){
                $a->result = 'F';
                $a->save();
            }
        }
    }

    public function index()
    {
        $id = Auth::id();
        $app = PostponeApplication::where('user_id',$id)->orderBy('created_at','asc')->get();
        $this->getUpdateGrade($app);
        return view('client.index', compact('app'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
