<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function designationView()
    {
        $data['designations'] = Designation::all();
        return view('backend.setup.designation.view-designation', $data);
    }

    public function designationCreate()
    {
        return view('backend.setup.designation.create-designation');
    }

    public function designationStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:designations'
        ]);
        $designation = new Designation();
        $designation->name = $request->name;
        $designation->save();
        $notification = array(
            'message' => 'Designation Created Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function designationEdit($id)
    {
        $designation = Designation::find($id);
        return view('backend.setup.designation.edit-designation', compact('designation'));
    }

    public function designationUpdate(Request $request, $id)
    {
        $designation = Designation::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:designations,name, '.$designation->id
        ]);
        $designation->name = $request->name;
        $designation->save();
        $notification = array(
            'message' => 'Designation Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function designationDelete($id)
    {
        $designation = Designation::find($id);
        $designation->delete();
        $notification = array(
            'message' => 'Designation Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('designation.view')->with($notification);

    }
}
