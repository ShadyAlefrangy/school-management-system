<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function schoolSubjectView()
    {
        $data['schoolSubjects'] = SchoolSubject::all();
        return view('backend.setup.school-subject.view-school-subject', $data);
    }

    public function schoolSubjectCreate()
    {
        return view('backend.setup.school-subject.create-school-subject');
    }

    public function schoolSubjectStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects'
        ]);
        $schoolSubject = new SchoolSubject();
        $schoolSubject->name = $request->name;
        $schoolSubject->save();
        $notification = array(
            'message' => 'School Subject Created Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('school.subject.view')->with($notification);
    }

    public function schoolSubjectEdit($id)
    {
        $schoolSubject = SchoolSubject::find($id);
        return view('backend.setup.school-subject.edit-school-subject', compact('schoolSubject'));
    }

    public function schoolSubjectUpdate(Request $request, $id)
    {
        $schoolSubject = SchoolSubject::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects,name, '.$schoolSubject->id
        ]);
        $schoolSubject->name = $request->name;
        $schoolSubject->save();
        $notification = array(
            'message' => 'School Subject Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('school.subject.view')->with($notification);
    }

    public function schoolSubjectDelete($id)
    {
        $schoolSubject = SchoolSubject::find($id);
        $schoolSubject->delete();
        $notification = array(
            'message' => 'School Subject Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('school.subject.view')->with($notification);

    }
}
