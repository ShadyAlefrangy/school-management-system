<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function studentGroupView()
    {
        $data['groups'] = StudentGroup::all();
        return view('backend.setup.student-group.view-group-student', $data);
    }

    public function studentGroupCreate()
    {
        return view('backend.setup.student-group.create-student-group');
    }

    public function studentGroupStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups'
        ]);
        $studentGroup = new StudentGroup();
        $studentGroup->name = $request->name;
        $studentGroup->save();
        $notification = array(
            'message' => 'Student Group Created Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function studentGroupEdit($id)
    {
        $studentGroup = StudentGroup::find($id);
        return view('backend.setup.student-group.edit-student-group', compact('studentGroup'));
    }

    public function studentGroupUpdate(Request $request, $id)
    {
        $studentGroup = StudentGroup::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name, '.$studentGroup->id
        ]);
        $studentGroup->name = $request->name;
        $studentGroup->save();
        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function studentGroupDelete($id)
    {
        $studentGroup = StudentGroup::find($id);
        $studentGroup->delete();
        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.group.view')->with($notification);

    }
}
