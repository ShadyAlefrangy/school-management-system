<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function feeCategoryView()
    {
        $data['feeCaategories'] = FeeCategory::all();
        return view('backend.setup.fee-category.view-fee-category', $data);
    }

    public function feeCategoryCreate()
    {
        return view('backend.setup.fee-category.create-fee-category');
    }

    public function feeCategoryStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories'
        ]);
        $feeCategory = new FeeCategory();
        $feeCategory->name = $request->name;
        $feeCategory->save();
        $notification = array(
            'message' => 'Fee Category Created Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('fee.category.view')->with($notification);
    }

    public function feeCategoryEdit($id)
    {
        $feeCategory = FeeCategory::find($id);
        return view('backend.setup.fee-category.edit-fee-category', compact('feeCategory'));
    }

    public function feeCategoryUpdate(Request $request, $id)
    {
        $feeCategory = FeeCategory::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name, '.$feeCategory->id
        ]);
        $feeCategory->name = $request->name;
        $feeCategory->save();
        $notification = array(
            'message' => 'Fee Category Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('fee.category.view')->with($notification);
    }

    public function feeCategoryDelete($id)
    {
        $feeCategory = FeeCategory::find($id);
        $feeCategory->delete();
        $notification = array(
            'message' => 'Fee Category Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('fee.category.view')->with($notification);

    }
}
