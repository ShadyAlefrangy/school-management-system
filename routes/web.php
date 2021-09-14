<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\Setup\AssignSubjectController;
use App\Http\Controllers\backend\Setup\DesignationController;
use App\Http\Controllers\backend\Setup\ExamTypeController;
use App\Http\Controllers\backend\Setup\FeeAmountController;
use App\Http\Controllers\backend\Setup\FeeCategoryController;
use App\Http\Controllers\backend\Setup\SchoolSubjectController;
use App\Http\Controllers\backend\Setup\StudentClassController;
use App\Http\Controllers\backend\Setup\StudentGroupController;
use App\Http\Controllers\backend\Setup\StudentShiftController;
use App\Http\Controllers\backend\Setup\StudentYearController;
use App\Http\Controllers\backend\Student\ExamFeeController;
use App\Http\Controllers\backend\Student\MonthlyFeeController;
use App\Http\Controllers\backend\Student\RegistrationFeeController;
use App\Http\Controllers\backend\Student\StudentRegistrationController;
use App\Http\Controllers\backend\Student\StudentRollController;
use App\Http\Controllers\backend\UserController;
use App\Models\SchoolSubject;
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

Route::group(['middleware' => 'auth'], function() {

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

    // Fee Category Routes
    Route::get('fee/category/view', [FeeCategoryController::class, 'feeCategoryView'])->name('fee.category.view');
    Route::get('fee/category/create', [FeeCategoryController::class, 'feeCategoryCreate'])->name('fee.category.create');
    Route::post('fee/category/store', [FeeCategoryController::class, 'feeCategoryStore'])->name('fee.category.store');
    Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'feeCategoryEdit'])->name('fee.category.edit');
    Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'feeCategoryUpdate'])->name('fee.category.update');
    Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'feeCategoryDelete'])->name('fee.category.delete');

     // Fee Category Amount Routes
     Route::get('fee/amount/view', [FeeAmountController::class, 'feeAmountView'])->name('fee.amount.view');
     Route::get('fee/amount/create', [FeeAmountController::class, 'feeAmountCreate'])->name('fee.amount.create');
     Route::post('fee/amount/store', [FeeAmountController::class, 'feeAmountStore'])->name('fee.amount.store');
     Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'feeAmountEdit'])->name('fee.amount.edit');
     Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'feeAmountUpdate'])->name('fee.amount.update');
     Route::get('fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'feeAmountDetails'])->name('fee.amount.details');

     // Exam Type Routes
    Route::get('exam/type/view', [ExamTypeController::class, 'examTypeView'])->name('exam.type.view');
    Route::get('exam/type/create', [ExamTypeController::class, 'examTypeCreate'])->name('exam.type.create');
    Route::post('exam/type/store', [ExamTypeController::class, 'examTypeStore'])->name('exam.type.store');
    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'examTypeEdit'])->name('exam.type.edit');
    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'examTypeUpdate'])->name('exam.type.update');
    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'examTypeDelete'])->name('exam.type.delete');

     // School Subject Routes
     Route::get('school/subject/view', [SchoolSubjectController::class, 'schoolSubjectView'])->name('school.subject.view');
     Route::get('school/subject/create', [SchoolSubjectController::class, 'schoolSubjectCreate'])->name('school.subject.create');
     Route::post('school/subject/store', [SchoolSubjectController::class, 'schoolSubjectStore'])->name('school.subject.store');
     Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'schoolSubjectEdit'])->name('school.subject.edit');
     Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'schoolSubjectUpdate'])->name('school.subject.update');
     Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'schoolSubjectDelete'])->name('school.subject.delete');

      // Assign Subject Routes
      Route::get('assign/subject/view', [AssignSubjectController::class, 'assignSubjectView'])->name('assign.subject.view');
      Route::get('assign/subject/create', [AssignSubjectController::class, 'assignSubjectCreate'])->name('assign.subject.create');
      Route::post('assign/subject/store', [AssignSubjectController::class, 'assignSubjectStore'])->name('assign.subject.store');
      Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'assignSubjectEdit'])->name('assign.subject.edit');
      Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'assignSubjectUpdate'])->name('assign.subject.update');
      Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'assignSubjectDetails'])->name('assign.subject.details');

      // Designation Routes
    Route::get('designation/view', [DesignationController::class, 'designationView'])->name('designation.view');
    Route::get('designation/create', [DesignationController::class, 'designationCreate'])->name('designation.create');
    Route::post('designation/store', [DesignationController::class, 'designationStore'])->name('designation.store');
    Route::get('designation/edit/{id}', [DesignationController::class, 'designationEdit'])->name('designation.edit');
    Route::post('designation/update/{id}', [DesignationController::class, 'designationUpdate'])->name('designation.update');
    Route::get('designation/delete/{id}', [DesignationController::class, 'designationDelete'])->name('designation.delete');
});

// Student Management Routes
Route::prefix('students')->group(function () {
    Route::get('registration/view', [StudentRegistrationController::class, 'studentRegistrationView'])->name('student.registration.view');
    Route::get('registration/create', [StudentRegistrationController::class, 'studentRegistrationCreate'])->name('student.registration.create');
    Route::post('registration/store', [StudentRegistrationController::class, 'studentRegistrationStore'])->name('student.registration.store');
    Route::get('year/class/wise', [StudentRegistrationController::class, 'studentYearClassWise'])->name('student.year.class.wise');
    Route::get('registration/edit/{student_id}', [StudentRegistrationController::class, 'studentRegistrationEdit'])->name('student.registration.edit');
    Route::post('registration/update/{student_id}', [StudentRegistrationController::class, 'studentRegistrationUpdate'])->name('student.registration.update');
    Route::get('registration/promotion/{student_id}', [StudentRegistrationController::class, 'studentRegistrationPromotion'])->name('student.registration.promotion');
    Route::post('registration/promotion/update/{student_id}', [StudentRegistrationController::class, 'studentRegistrationPromotionUpdate'])->name('student.registration.promotion.update');
    Route::get('registration/details/{student_id}', [StudentRegistrationController::class, 'studentRegistrationDetails'])->name('student.registration.details');
    
    // Roll Generator Routes 
    Route::get('roll/generate/view', [StudentRollController::class, 'studentRollView'])->name('roll.generate.view');
    Route::get('registration/getstudents', [StudentRollController::class, 'getStudents'])->name('student.registration.getstudents');
    Route::post('roll/generate/store', [StudentRollController::class, 'rollGenerateStore'])->name('roll.generate.store');

    // Registration Fee Routes 
    Route::get('registration/fee/view', [RegistrationFeeController::class, 'registrationFeeView'])->name('registration.fee.view');
    Route::get('registration/fee/classwisedata', [RegistrationFeeController::class, 'registrationFeeClassData'])->name('student.registration.fee.classwise.get');
    Route::get('registration/fee/payslip', [RegistrationFeeController::class, 'registrationFeePayslip'])->name('student.registration.fee.payslip');
    
    // Monthly Fee Routes 
    Route::get('monthly/fee/view', [MonthlyFeeController::class, 'monthlyFeeView'])->name('monthly.fee.view');
    Route::get('monthly/fee/classwisedata', [MonthlyFeeController::class, 'monthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
    Route::get('monthly/fee/payslip', [MonthlyFeeController::class, 'monthlyFeePayslip'])->name('student.monthly.fee.payslip');

    // Exam Fee Routes 
    Route::get('exam/fee/view', [ExamFeeController::class, 'examFeeView'])->name('exam.fee.view');
    Route::get('exam/fee/classwisedata', [ExamFeeController::class, 'examFeeClassData'])->name('student.exam.fee.classwise.get');
    Route::get('exam/fee/payslip', [ExamFeeController::class, 'examFeePayslip'])->name('student.exam.fee.payslip');
  
});
}); // End Middleware