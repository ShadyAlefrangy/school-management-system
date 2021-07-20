<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function studentShiftView()
    {
        $data['shifts'] = StudentShift::all();
        return view('backend.setup.student-shift.view-shift-student', $data);
    }

    public function studentShiftCreate()
    {
        return view('backend.setup.student-shift.create-student-shift');
    }

    public function studentShiftStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts'
        ]);
        $studentShift = new StudentShift();
        $studentShift->name = $request->name;
        $studentShift->save();
        $notification = array(
            'message' => 'Student Shift Created Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function studentShiftEdit($id)
    {
        $studentShift = StudentShift::find($id);
        return view('backend.setup.student-shift.edit-student-shift', compact('studentShift'));
    }

    public function studentShiftUpdate(Request $request, $id)
    {
        $studentShift = StudentShift::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name, '.$studentShift->id
        ]);
        $studentShift->name = $request->name;
        $studentShift->save();
        $notification = array(
            'message' => 'Student Shift Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function studentShiftDelete($id)
    {
        $studentShift = StudentShift::find($id);
        $studentShift->delete();
        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.shift.view')->with($notification);

    }
}
