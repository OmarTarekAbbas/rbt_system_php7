<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Employee_contracts;
use Validator;
use Illuminate\Http\Request;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $employees = Employees::all();
      return view('employees.index',compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $employee = new Employees();
        $employee->full_name = $request->full_name;
        $employee->phone = $request->phone;
        $employee->status = $request->status;
        $employee->release_date = $request->release_date;
        $employee->save();
        \Session::flash('success', 'Employee Create successfully');
        return redirect('employees');
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $employee = Employees::findOrFail($id);
      $employee_contracts = Employee_contracts::where('employee_id',$id)->get();
      return view('employees.show',compact('employee','employee_contracts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employees $employees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $employee = Employees::findOrfail($id);

      $employee->delete();

      \Session::flash('success', 'Employee Deleted successfully');

      return redirect('employees');
    }
}
