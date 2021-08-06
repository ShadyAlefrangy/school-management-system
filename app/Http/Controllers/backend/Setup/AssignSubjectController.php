<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function assignSubjectView()
    {
        // $data['assignSubjects'] = AssignSubject::all();
        $data['assignSubjects'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign-subject.view-assign-subject', $data);
    }

    public function assignSubjectCreate()
    {
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign-subject.create-assign-subject', $data);
    }

    public function assignSubjectStore(Request $request)
    {
        $subjectCount = count($request->subject_id);
        if ($subjectCount != NULL) {
            for ($i=0; $i < $subjectCount; $i++) { 
                $assignSubject = new AssignSubject();
                $assignSubject->class_id = $request->class_id;
                $assignSubject->subject_id = $request->subject_id[$i];
                $assignSubject->full_mark = $request->full_mark[$i];
                $assignSubject->pass_mark = $request->pass_mark[$i];
                $assignSubject->subjective_mark = $request->subjective_mark[$i];
                $assignSubject->save();
            }
        }
        $notification = array(
            'message' => 'Subject Assigned Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('assign.subject.view')->with($notification);
    }

    public function assignSubjectEdit($class_id)
    {
        $data['editAssignSubjects'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign-subject.edit-assign-subject', $data);
    }

    public function assignSubjectUpdate(Request $request, $class_id)
    {
        if ($request->subject_id == NULL) {
            $notification = array(
                'message' => 'Sorry, you do not select any subject.',
                'alert-type' => 'error',
            );
    
            return redirect()->route('assign.subject.edit', $class_id)->with($notification);
        } else {
            $subjectCount = count($request->subject_id);
            AssignSubject::where('class_id', $class_id)->delete();
            for ($i=0; $i < $subjectCount; $i++) { 
                $assignSubject = new AssignSubject();
                $assignSubject->class_id = $request->class_id;
                $assignSubject->subject_id = $request->subject_id[$i];
                $assignSubject->full_mark = $request->full_mark[$i];
                $assignSubject->pass_mark = $request->pass_mark[$i];
                $assignSubject->subjective_mark = $request->subjective_mark[$i];
                $assignSubject->save();
            }
            $notification = array(
                'message' => 'Subject Assigned Updated Successfully',
                'alert-type' => 'success',
            );
    
            return redirect()->route('assign.subject.view')->with($notification);
        }
        
    }

    public function assignSubjectDetails($class_id)
    {
        $assignSubjects = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        return view('backend.setup.assign-subject.details-assign-subject', compact('assignSubjects'));
    }
}
