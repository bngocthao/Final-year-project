<?php

use App\Models\Subject;

if(!function_exists('getAllSubject')){
    function getAllSubject()
    {
        return Subject::all();
    }
}

if(!function_exists('getUserByRole')){
    function getUserByRole($role)
    {
        return User::where('role',$role)->get();
    }
}


if(!function_exists('test')){
    function test()
    {
        return 123;
    }
}
