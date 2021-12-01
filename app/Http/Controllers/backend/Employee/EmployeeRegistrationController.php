<?php

namespace App\Http\Controllers\backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Employee_SalaryLog;
use App\Models\EmployeeSalaryLog;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use PDF;

class EmployeeRegistrationController extends Controller
{
    public function employeeRegistrationView()
    {
        $data['employees'] = User::where('usertype', 'Employee')->get();
        return view('backend.employee.employee-registration.employee-registration-view', $data);
    }

    public function employeeRegistrationCreate()
    {
        $data['desgnations'] = Designation::all();
        return view('backend.employee.employee-registration.employee-registration-create', $data);
    }

    public function employeeRegistrationStore(Request $request)
    {
        DB::transaction(function () use($request) {
            $checkYear = date('Ym', strtotime($request->join_date));
            $employee = User::where('usertype', 'Employee')->orderBy('id', 'DESC')->first();
            if ($employee == NULL) {
                $firstRef = 0;
                $employeeId = $firstRef + 1;
                if ($employeeId < 10) {
                    $id_number = '000' . $employeeId;
                } elseif ($employeeId < 100) {
                    $id_number = '00' . $employeeId;
                } elseif ($employeeId < 1000) {
                    $id_number = '0' . $employeeId;
                }
            } else {
                $employee = User::where('usertype', 'Employee')->orderBy('id', 'DESC')->first()->id;
                $employeeId = $employee + 1;
                if ($employeeId < 10) {
                    $id_number = '000' . $employeeId;
                } elseif ($employeeId < 100) {
                    $id_number = '00' . $employeeId;
                } elseif ($employeeId < 1000) {
                    $id_number = '0' . $employeeId;
                }
            }
            $final_id_number = $checkYear . $id_number;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_number = $final_id_number;
            $user->code = $code;
            $user->password = bcrypt($code);
            $user->usertype = "Employee";
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
            $user->join_date = date('Y-m-d', strtotime($request->join_date));
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            if ($request->file('image')) {
                $file = $request->file('image');
                if ($user->image) {
                    unlink(public_path('upload/employees_images/'.$user->image));
                }
                $filename = Date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employees_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();

            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->effected_salary = date('Y-m-d', strtotime($request->join_date));
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = '0';
            $employee_salary->save();

        });

        $notification = array(
            'message' => 'Employee Regestration Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('employee.registration.view')->with($notification);

    }

    public function employeeRegistrationEdit($id)
    {
        $data['employee'] = User::find($id);
        $data['desgnations'] = Designation::all();
        return view('backend.employee.employee-registration.employee-registration-edit', $data);

    }

    public function employeeRegistrationUpdate(Request $request, $id)
    {
        
            $employee = User::find($id);
            $employee->name = $request->name;
            $employee->father_name = $request->father_name;
            $employee->mother_name = $request->mother_name;
            $employee->mobile = $request->mobile;
            $employee->address = $request->address;
            $employee->gender = $request->gender;
            $employee->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
            $employee->religion = $request->religion;
            $employee->designation_id = $request->designation_id;
            if ($request->file('image')) {
                $file = $request->file('image');
                if ($employee->image) {
                    unlink(public_path('upload/employees_images/'.$employee->image));
                }
                $filename = Date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employees_images'), $filename);
                $employee['image'] = $filename;
            }
            $employee->save();

            $notification = array(
                'message' => 'Employee Updated Successfully',
                'alert-type' => 'info',
            );
    
            return redirect()->route('employee.registration.view')->with($notification);
    }

    public function employeeRegistrationDetails($id)
    {
        $data['employee'] = User::find($id);
        $pdf = PDF::loadView('backend.employee.employee-registration.employee-registration-details', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
