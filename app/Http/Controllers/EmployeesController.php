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

        $employeeMove = 'uploads/employee_papers';
        $files = ['birth_certificate','graduation_certificate','army_certificate','insurance_certificate','fish_watashbih'];
        foreach($files as $file){
          if ($request->hasFile($file)) {
            if ($request->file($file)->isValid()) {
                try {
                    $employee_papers = time() .rand(0,999). '.' . $request->$file->getClientOriginalExtension();
                    $request->$file->move($employeeMove, $employee_papers);
                    $employee->$file = $employee_papers;
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
        }
        }
        $employee->save();
        \Session::flash('success', 'Employee Create successfully');
        return redirect('employees/'.$employee->id);
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
       $employee_contracts = $employee->employee_contracts;
      return view('employees.show',compact('employee','employee_contracts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $employee = Employees::findOrFail($id);
      return view('employees.create',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $employee = Employees::find($id);
      $employee->full_name = $request->full_name;
      $employee->phone = $request->phone;
      $employee->status = $request->status;
      $employee->release_date = $request->release_date;
      $employeeMove = 'uploads/employee_papers';
        $files = ['birth_certificate','graduation_certificate','army_certificate','insurance_certificate','fish_watashbih'];
        foreach($files as $file){
          if ($request->hasFile($file)) {
            if ($request->file($file)->isValid()) {
                try {
                    $employee_papers = time() .rand(0,999). '.' . $request->$file->getClientOriginalExtension();
                    $request->$file->move($employeeMove, $employee_papers);
                    $employee->$file = $employee_papers;
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
        }
        }
      $employee->save();
      \Session::flash('success', 'Employee Update successfully');
      return redirect('employees/'.$id);
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
