<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function examTypeView()
    {
        $data['examTypes'] = ExamType::all();
        return view('backend.setup.exam-type.view-exam-type', $data);
    }

    public function examTypeCreate()
    {
        return view('backend.setup.exam-type.create-exam-type');
    }

    public function examTypeStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types'
        ]);
        $ExamType = new ExamType();
        $ExamType->name = $request->name;
        $ExamType->save();
        $notification = array(
            'message' => 'Exam Type Created Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('exam.type.view')->with($notification);
    }

    public function examTypeEdit($id)
    {
        $examType = ExamType::find($id);
        return view('backend.setup.exam-type.edit-exam-type', compact('examType'));
    }

    public function examTypeUpdate(Request $request, $id)
    {
        $examType = ExamType::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name, '.$examType->id
        ]);
        $examType->name = $request->name;
        $examType->save();
        $notification = array(
            'message' => 'Exam Type Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('exam.type.view')->with($notification);
    }

    public function examTypeDelete($id)
    {
        $examType = ExamType::find($id);
        $examType->delete();
        $notification = array(
            'message' => 'Exam Type Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('exam.type.view')->with($notification);

    }
}
