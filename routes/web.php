<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\Setup\StudentClassController;
use App\Http\Controllers\backend\Setup\StudentGroupController;
use App\Http\Controllers\backend\Setup\StudentShiftController;
use App\Http\Controllers\backend\Setup\StudentYearController;
use App\Http\Controllers\backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Manage Users Routes
Route::prefix('users')->group(function () {
    Route::get('view', [UserController::class, 'userView'])->name('user.view');
    Route::get('create', [UserController::class, 'userCreate'])->name('user.create');
    Route::post('store', [UserController::class, 'userStore'])->name('user.store');
    Route::get('edit/{id}', [UserController::class, 'userEdit'])->name('user.edit');
    Route::post('update/{id}', [UserController::class, 'userUpdate'])->name('user.update');
    Route::get('delete/{id}', [UserController::class, 'userDelete'])->name('user.delete');
});

// Manage Profile Routes
Route::prefix('profile')->group(function () {
    Route::get('view', [ProfileController::class, 'profileView'])->name('profile.view');
    Route::get('edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');
    Route::post('update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::get('password/change', [ProfileController::class, 'profilePasswordChange'])->name('profile.password.change');
    Route::post('password/update', [ProfileController::class, 'profilePasswordUpdate'])->name('profile.password.update');
    
  
});

// Setup Management Routes

Route::prefix('setups')->group(function () {
    // Student Class Routes
    Route::get('student/class/view', [StudentClassController::class, 'studentClassView'])->name('student.class.view');
    Route::get('student/class/create', [StudentClassController::class, 'studentClassCreate'])->name('student.class.create');
    Route::post('student/class/store', [StudentClassController::class, 'studentClassStore'])->name('student.class.store');
    Route::get('student/class/edit/{id}', [StudentClassController::class, 'studentClassEdit'])->name('student.class.edit');
    Route::post('student/class/update/{id}', [StudentClassController::class, 'studentClassUpdate'])->name('student.class.update');
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'studentClassDelete'])->name('student.class.delete');

    // Student Year Routes
    Route::get('student/year/view', [StudentYearController::class, 'studentYearView'])->name('student.year.view');
    Route::get('student/year/create', [StudentYearController::class, 'studentYearCreate'])->name('student.year.create');
    Route::post('student/year/store', [StudentYearController::class, 'studentYearStore'])->name('student.year.store');
    Route::get('student/year/edit/{id}', [StudentYearController::class, 'studentYearEdit'])->name('student.year.edit');
    Route::post('student/year/update/{id}', [StudentYearController::class, 'studentYearUpdate'])->name('student.year.update');
    Route::get('student/year/delete/{id}', [StudentYearController::class, 'studentYearDelete'])->name('student.year.delete');

    // Student Group Routes
    Route::get('student/group/view', [StudentGroupController::class, 'studentGroupView'])->name('student.group.view');
    Route::get('student/group/create', [StudentGroupController::class, 'studentGroupCreate'])->name('student.group.create');
    Route::post('student/group/store', [StudentGroupController::class, 'studentGroupStore'])->name('student.group.store');
    Route::get('student/group/edit/{id}', [StudentGroupController::class, 'studentGroupEdit'])->name('student.group.edit');
    Route::post('student/group/update/{id}', [StudentGroupController::class, 'studentGroupUpdate'])->name('student.group.update');
    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'studentGroupDelete'])->name('student.group.delete');

    // Student Shift Routes
    Route::get('student/shift/view', [StudentShiftController::class, 'studentShiftView'])->name('student.shift.view');
    Route::get('student/shift/create', [StudentShiftController::class, 'studentShiftCreate'])->name('student.shift.create');
    Route::post('student/shift/store', [StudentShiftController::class, 'studentShiftStore'])->name('student.shift.store');
    Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'studentShiftEdit'])->name('student.shift.edit');
    Route::post('student/shift/update/{id}', [StudentShiftController::class, 'studentShiftUpdate'])->name('student.shift.update');
    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'studentShiftDelete'])->name('student.shift.delete');
});
