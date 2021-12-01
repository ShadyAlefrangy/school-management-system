<?php

namespace App\Http\Controllers\backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeSalaryLog;
use App\Models\User;
use Illuminate\Http\Request;


class EmployeeSalaryController extends Controller
{
    public function employeeSalaryView()
    {
        $data['employees'] = User::where('usertype', 'Employee')->get();
        return view('backend.employee.employee-salary.employee-salary-view', $data);
    }

    public function employeeSalaryIncrement($id)
    {
        $data['employee'] = User::find($id);
        return view('backend.employee.employee-salary.employee-salary-increment', $data);

    }

    public function employeeSalaryIncrementStore(Request $request, $id)
    {
        $employee = User::find($id);
        $previous_salary = $employee->salary;
        $present_salary = (float)$previous_salary + (float)$request->increment_salary;
        $employee->salary = $present_salary;
        $employee->save();

        $salaryDataLog = new EmployeeSalaryLog();
        $salaryDataLog->employee_id =  $id;
        $salaryDataLog->previous_salary = $previous_salary;
        $salaryDataLog->present_salary = $present_salary;
        $salaryDataLog->increment_salary = $request->increment_salary;
        $salaryDataLog->effected_salary = date('Y-m-d', strtotime($request->effected_salary));
        $salaryDataLog->save();

        $notification = array(
            'message' => 'Employee Salary Incremented Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('employee.salary.view')->with($notification);

    }

    public function employeeSalaryDetails($id)
    {
        $data['employee'] = User::find($id);
        $data['salary_logs'] = EmployeeSalaryLog::where('employee_id', $data['employee']->id)->get();
        return view('backend.employee.employee-salary.employee-salary-details', $data);
        
    }
}
