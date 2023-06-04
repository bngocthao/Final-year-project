<?php

use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\MajorsController;
use App\Http\Controllers\Admin\PostponeApplicationsController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\Admin\UnitsController;
use App\Http\Controllers\OtherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Client\PostponeApplicationController;
use App\Http\Controllers\Client\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('client.home');
});

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', function () {
    Auth::logout();
    return redirect('/user/login');
});

// admin controller
Route::middleware(['auth','admin.auth'])->prefix('admin')->group(function () {
    Route::resource('/users', UsersController::class);
    Route::resource('/roles', \App\Http\Controllers\Admin\RolesController::class);
    Route::resource('/postponse_apps', PostponeApplicationsController::class);
    Route::resource('/units', UnitsController::class);
    Route::resource('/majors', MajorsController::class);
    Route::resource('/subjects', SubjectsController::class);
    Route::resource('/comments', CommentsController::class);
//    Route::resource('/forms', PostponeApplicationController::class);
    Route::resource('/years', \App\Http\Controllers\Admin\YearsController::class);
});


// client controller
Route::middleware(['client.auth'])->prefix('user')->group(function(){
//    Route::get('/index', [App\Http\Controllers\HomeController::class, 'client_index'])->name('client.index');
    Route::resource('/', UserController::class);
    Route::resource('/form', PostponeApplicationController::class);
    Route::post('/form/post',[PostponeApplicationController::class, 'post_form'])->name('client.post_form');
});

// Roue đang nhap cho user
//Route::get('/user/login',[\App\Http\Controllers\OtherController::class,'getLogin'])->name('user.getLogin');
//Route::post('/user/login/process',[\App\Http\Controllers\OtherController::class,'login'])->name('user.postLogin');
//Route::get('/user/logout',[\App\Http\Controllers\OtherController::class,'logout'])->name('user.getLogout');
Route::get('/user/login',[\App\Http\Controllers\OtherController::class,'getLogin'])->name('user.getLogin');
Route::get('/user/register',[\App\Http\Controllers\Client\ClientAuth::class,'registration'])->name('user.getRegister');
Route::post('/user/index',[\App\Http\Controllers\OtherController::class,'login'])->name('user.postLogin');
Route::post('/user/register/process',[\App\Http\Controllers\Client\ClientAuth::class,'register'])->name('user.register');
Route::get('/user/logout',[\App\Http\Controllers\OtherController::class,'logout'])->name('user.getLogout');

Route::get('/index-user',[OtherController::class,'index_user'])->name('user.index_user');

// test mail
Route::get('/mymailform',[PostponeApplicationController::class,'check_mail'])->name('mymailform');
// test landing page
Route::get('/land', function () {
    return view('client.landing_page');
});

