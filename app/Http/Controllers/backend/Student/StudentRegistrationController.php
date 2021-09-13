<?php

namespace App\Http\Controllers\backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class StudentRegistrationController extends Controller
{
    public function studentRegistrationView()
    {
        $data['year_id'] = StudentYear::orderBy('id', 'desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id', 'desc')->first()->id;
        $data['students'] = AssignStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        return view('backend.student.student-registration.student-registration-view', $data);
    }

    public function studentYearClassWise(Request $request)
    {
        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        $data['students'] = AssignStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        return view('backend.student.student-registration.student-registration-view', $data);
    }

    public function studentRegistrationCreate()
    {
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.student.student-registration.student-registration-create', $data);
    }

    public function studentRegistrationStore(Request $request)
    {
        DB::transaction(function () use($request) {
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'student')->orderBy('id', 'DESC')->first();
            if ($student == NULL) {
                $firstRef = 0;
                $studentId = $firstRef + 1;
                if ($studentId < 10) {
                    $id_number = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_number = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_number = '0' . $studentId;
                }
            } else {
                $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student + 1;
                if ($studentId < 10) {
                    $id_number = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_number = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_number = '0' . $studentId;
                }
            }
            $final_id_number = $checkYear . $id_number;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_number = $final_id_number;
            $user->code = $code;
            $user->password = bcrypt($code);
            $user->usertype = "Student";
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
            $user->religion = $request->religion;
            if ($request->file('image')) {
                $file = $request->file('image');
                if ($user->image) {
                    unlink(public_path('upload/students_images/'.$user->image));
                }
                $filename = Date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/students_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();

            $assignStudent = new AssignStudent();
            $assignStudent->student_id = $user->id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();

            $discountStudent = new DiscountStudent();
            $discountStudent->assign_student_id = $assignStudent->id;
            $discountStudent->fee_category_id = 1;
            $discountStudent->discount = $request->discount;
            $discountStudent->save();

        });

        $notification = array(
            'message' => 'Student Regestration Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.registration.view')->with($notification);

    }

    public function studentRegistrationEdit($student_id)
    {
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['student'] = AssignStudent::with(['student', 'discount'])->where('student_id', $student_id)->first();
        return view('backend.student.student-registration.student-registration-edit', $data);
    }

    public function studentRegistrationUpdate(Request $request, $student_id)
    {
        DB::transaction(function () use($request, $student_id) {
            
            
            $user = User::where('id', $student_id)->first();
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
            $user->religion = $request->religion;
            if ($request->file('image')) {
                $file = $request->file('image');
                if ($user->image) {
                    unlink(public_path('upload/students_images/'.$user->image));
                }
                $filename = Date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/students_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();

            $assignStudent = AssignStudent::where('id', $request->id)->where('student_id', $student_id)->first();
            $assignStudent->class_id = $request->class_id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();

            $discountStudent = DiscountStudent::where('assign_student_id', $request->id)->first();
            $discountStudent->discount = $request->discount;
            $discountStudent->save();

        });

        $notification = array(
            'message' => 'Student Regestration Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.registration.view')->with($notification);

    }

    public function studentRegistrationPromotion($student_id)
    {
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['student'] = AssignStudent::with(['student', 'discount'])->where('student_id', $student_id)->first();
        return view('backend.student.student-registration.student-registration-promotion', $data);
    }

    public function studentRegistrationPromotionUpdate(Request $request, $student_id)
    {
        DB::transaction(function () use($request, $student_id) {
            
            
            $user = User::where('id', $student_id)->first();
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
            $user->religion = $request->religion;
            if ($request->file('image')) {
                $file = $request->file('image');
                if ($user->image) {
                    unlink(public_path('upload/students_images/'.$user->image));
                }
                $filename = Date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/students_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();

            $assignStudent = new AssignStudent();
            $assignStudent->student_id = $student_id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();

            $discountStudent = new DiscountStudent();
            $discountStudent->assign_student_id = $assignStudent->id;
            $discountStudent->fee_category_id = 1;
            $discountStudent->discount = $request->discount;
            $discountStudent->save();

        });

        $notification = array(
            'message' => 'Student Regestration Promotion Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.registration.view')->with($notification);

    }

    public function studentRegistrationDetails($student_id)
    {
        $data['student'] = AssignStudent::with(['student', 'discount'])->where('student_id', $student_id)->first();
        $pdf = PDF::loadView('backend.student.student-registration.student-registration-details', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

       
}

