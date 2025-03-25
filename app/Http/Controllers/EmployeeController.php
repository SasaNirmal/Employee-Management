<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee_list', compact('employees'));
    }

    public function create()
    {
        return view('employee');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_code' => 'required|unique:employees',
            'employee_name' => 'required',
            'nic' => 'required|unique:employees',
            'address' => 'nullable',
        ]);

        Employee::create($request->all());

        return redirect()->route('employee.list')->with('success', 'Employee saved successfully.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_code' => 'required|unique:employees,employee_code,' . $id,
            'employee_name' => 'required',
            'nic' => 'required|unique:employees,nic,' . $id,
            'address' => 'nullable',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employee.list')->with('success', 'Employee updated successfully.');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee_show', compact('employee'));
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->route('employee.list')->with('success', 'Employee deleted successfully.');
    }
}
