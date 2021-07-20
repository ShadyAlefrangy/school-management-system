<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\Setup\StudentClassController;
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
    Route::get('student/class/view', [StudentClassController::class, 'studentClassView'])->name('student.class.view');
    Route::get('student/class/create', [StudentClassController::class, 'studentClassCreate'])->name('student.class.create');
    Route::post('student/class/store', [StudentClassController::class, 'studentClassStore'])->name('student.class.store');
    Route::get('student/class/edit/{id}', [StudentClassController::class, 'studentClassEdit'])->name('student.class.edit');
    Route::post('student/class/update/{id}', [StudentClassController::class, 'studentClassUpdate'])->name('student.class.update');
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'studentClassDelete'])->name('student.class.delete');

    
  
});
