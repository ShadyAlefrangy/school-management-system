<?php

namespace App\Http\Controllers\backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRollController extends Controller
{
    public function studentRollView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.student.student-roll-generate.student-roll-generate-view', $data);
    }

    public function getStudents(Request $request)
    {
        $data = AssignStudent::with(['student'])->where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        return response()->json($data);
    }

    public function rollGenerateStore(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($request->student_id != NULL) {
            for ($i=0; $i < count($request->student_id); $i++) { 
                AssignStudent::where('year_id', $year_id)->where('class_id', $class_id)->where('student_id', $request->student_id[$i])
                ->update(['roll' => $request->roll[$i]]);
            }
        } else {
            $notification = array(
                'message' => 'Unfortunately, no student was selected.',
                'alert-type' => 'error',
            );
    
            return redirect()->back()->with($notification);
        }

        $notification = array(
            'message' => 'Well Done, Student roll was generated successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('roll.generate.view')->with($notification);

    }
}
