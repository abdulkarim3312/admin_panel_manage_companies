<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    private $companies, $company, $employee;

    public function index()
    {
        $companies = Company::all();
        return view('admin.employee.index',['companies' => $companies]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'first_name'          => 'required',
            'email'               => 'required',
            'last_name'           => 'required',
        ]);

        Employee::newEmployee($request);
        return redirect('/employee/add')->with('message', 'Employee Created Successfully');
    }

    public function manage()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(5);
        return view('admin.employee.manage',['employees' => $employees]);
    }

    public function edit($id)
    {
        $this->companies = Company::all();
        $this->employee  = Employee::find($id);
        $this->company   = Company::find($this->employee->company_id);

//        dd($this->company);
        return view('admin.employee.edit', [
            'employee'        => $this->employee,
            'companies'       => $this->companies,
            'single_company'  => $this->company,
            ]);
    }

    public function update(Request $request, $id)
    {
        Employee::employeeUpdate($request,$id);
        return redirect('/employee/manage')->with('message', 'Employee Updated Successfully');
    }

    public function delete($id)
    {
        Employee::employeeDelete($id);
        return redirect('/employee/manage')->with('message2', 'Employee Deleted Successfully');
    }

}
