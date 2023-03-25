<?php

use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\MajorsController;
use App\Http\Controllers\Admin\PostponeApplicationsController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\Admin\UnitsController;
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

Auth::routes(['register'=>true]);

// Trước mắt cho admin.home là home chung
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('home/logout');

// Route::get('/res', [CustomResgisterController::class, 'resgister'])->name('user.register');
// Route::post('/store', [CustomResgisterController::class, 'store'])->name('user.store');
// admin route
// CRUD nam hoc, hoc ky, quan ly don, quan ly tai khoan
// admin -> ?? all
// giang vien chúc năng 3
// sv khong vao dc admin

// is_admin, is_teacher, is_student - 0 1 2
// user -> role. Dùng enum or 1 bảng mới
// ENumValue(Status, adm) )

// php artsisan make:middlware

// Route::middleware(['is_admin'])->prefix('admin')->group(function(){
//     Route::get('/testmid',[NguoiDungController::class, 'test'])->name('test.get');
// });

// admin controller
Route::resource('admin/users', UsersController::class)->middleware('auth');
Route::resource('admin/roles', \App\Http\Controllers\Admin\RolesController::class)->middleware('auth');
Route::resource('admin/postponse_apps', PostponeApplicationsController::class)->middleware('auth');
Route::resource('admin/units', UnitsController::class)->middleware('auth');
Route::resource('admin/majors', MajorsController::class)->middleware('auth');
Route::resource('admin/subjects', SubjectsController::class)->middleware('auth');
Route::resource('admin/comments', CommentsController::class)->middleware('auth');
Route::resource('admin/forms', PostponeApplicationController::class)->middleware('auth');
Route::resource('admin/years', \App\Http\Controllers\Admin\YearsController::class)->middleware('auth');



// client controller
Route::resource('client/user', UserController::class)->middleware('auth');
Route::resource('client/form', PostponeApplicationController::class)->middleware('auth');
