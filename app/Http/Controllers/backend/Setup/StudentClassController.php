<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function studentClassView()
    {
        $data['classes'] = StudentClass::all();
        return view('backend.setup.student-class.view-class', $data);
    }

    public function studentClassCreate()
    {
        return view('backend.setup.student-class.create-student-class');
    }

    public function studentClassStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5'
        ]);
        $studentClass = new StudentClass();
        $studentClass->name = $request->name;
        $studentClass->save();
        $notification = array(
            'message' => 'Studen Class Created Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function studentClassEdit($id)
    {
        $studentClass = StudentClass::find($id);
        return view('backend.setup.student-class.edit-student-class', compact('studentClass'));
    }

    public function studentClassUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5'
        ]);
        $studentClass = StudentClass::find($id);
        $studentClass->name = $request->name;
        $studentClass->save();
        $notification = array(
            'message' => 'Studen Class Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function studentClassDelete($id)
    {
        $studentClass = StudentClass::find($id);
        $studentClass->delete();
        $notification = array(
            'message' => 'Studen Class Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.class.view')->with($notification);

    }
}
