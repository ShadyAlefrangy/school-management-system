<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function feeAmountView()
    {
        // $data['feeAmounts'] = FeeCategoryAmount::all();
        $data['feeAmounts'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee-amount.view-fee-amount', $data);
    }

    public function feeAmountCreate()
    {
        $data['feeCaategories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee-amount.create-fee-amount', $data);
    }

    public function feeAmountStore(Request $request)
    {
        $classCount = count($request->class_id);
        if ($classCount != NULL) {
            for ($i=0; $i < $classCount; $i++) { 
                $feeAmount = new FeeCategoryAmount();
                $feeAmount->fee_category_id = $request->fee_category_id;
                $feeAmount->class_id = $request->class_id[$i];
                $feeAmount->amount = $request->amount[$i];
                $feeAmount->save();
            }
        }
        $notification = array(
            'message' => 'Fee Amount Data Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('fee.amount.view')->with($notification);
    }

    public function feeAmountEdit($fee_category_id)
    {
        $data['editFeeCaategories'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        $data['feeCaategories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee-amount.edit-fee-amount', $data);
    }

    public function feeAmountUpdate(Request $request, $fee_category_id)
    {
        if ($request->class_id == NULL) {
            $notification = array(
                'message' => 'Sorry, you do not select any class amount.',
                'alert-type' => 'error',
            );
    
            return redirect()->route('fee.amount.edit', $fee_category_id)->with($notification);
        } else {
            $classCount = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();
            for ($i=0; $i < $classCount; $i++) { 
                $feeAmount = new FeeCategoryAmount();
                $feeAmount->fee_category_id = $request->fee_category_id;
                $feeAmount->class_id = $request->class_id[$i];
                $feeAmount->amount = $request->amount[$i];
                $feeAmount->save();
            }
            $notification = array(
                'message' => 'Fee Amount Data Updated Successfully',
                'alert-type' => 'info',
            );
    
            return redirect()->route('fee.amount.view')->with($notification);
        }
        
    }

    public function feeAmountDetails($fee_category_id)
    {
        $feeAmounts = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        return view('backend.setup.fee-amount.details-fee-amount', compact('feeAmounts'));
    }
}
