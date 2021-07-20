<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function studentYearView()
    {
        $data['years'] = StudentYear::all();
        return view('backend.setup.student-year.view-year-student', $data);
    }

    public function studentYearCreate()
    {
        return view('backend.setup.student-year.create-student-year');
    }

    public function studentYearStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|unique:student_years'
        ]);
        $studentYear = new StudentYear();
        $studentYear->name = $request->name;
        $studentYear->save();
        $notification = array(
            'message' => 'Student Year Created Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function studentYearEdit($id)
    {
        $studentYear = StudentYear::find($id);
        return view('backend.setup.student-year.edit-student-year', compact('studentYear'));
    }

    public function studentYearUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4'
        ]);
        $studentYear = StudentYear::find($id);
        $studentYear->name = $request->name;
        $studentYear->save();
        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function studentYearDelete($id)
    {
        $studentYear = StudentYear::find($id);
        $studentYear->delete();
        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.year.view')->with($notification);

    }
}
