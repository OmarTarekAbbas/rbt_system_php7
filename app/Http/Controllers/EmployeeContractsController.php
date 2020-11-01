<?php

namespace App\Http\Controllers;

use App\ContractDuration;
use App\Employees;
use App\Employee_contracts;
use Illuminate\Http\Request;
use Validator;

class EmployeeContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $years = ContractDuration::all();
        $employee = Employees::findOrFail($id);
        return view('employees_contracts.create', compact('years', 'employee'));
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
        'contract_attachment' => 'required',
        ]);
        if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
        }
        $employee_contract = new Employee_contracts();
        $employee_contract->employee_id = $request->employee_id;
        $employee_contract->sign_date = date('Y-m-d', strtotime($request->sign_date));
        $employee_contract->contract_period = $request->contract_period;
        $employee_contract->end_date = date('Y-m-d', strtotime($request->end_date));
        $employee_contract->contract_status = $request->contract_status;
        if ($request->hasFile('contract_attachment')) {
            if ($request->file('contract_attachment')->isValid()) {
                try {
                    $pdfName = time() . '.' . $request->contract_attachment->getClientOriginalExtension();
                    $request->contract_attachment->move('uploads/employee_contract', $pdfName);
                    $employee_contract->contract_attachment = $pdfName;
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
        }
        $employee_contract->save();
        $request->session()->flash('success', 'Add Employee Contract Successfully');
        return redirect('employees/' . $request->employee_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employee_contracts  $employee_contracts
     * @return \Illuminate\Http\Response
     */
    public function show(employee_contracts $employee_contracts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employee_contracts  $employee_contracts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $years = ContractDuration::all();
      $employee_contract = Employee_contracts::findOrFail($id);
      $employee = $employee_contract->Employees;

      return view('employees_contracts.create', compact('years', 'employee_contract','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employee_contracts  $employee_contracts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $employee_contract = Employee_contracts::find($id);
      $employee_contract->employee_id = $request->employee_id;
      $employee_contract->sign_date = date('Y-m-d', strtotime($request->sign_date));
      $employee_contract->contract_period = $request->contract_period;
      $employee_contract->end_date = date('Y-m-d', strtotime($request->end_date));
      $employee_contract->contract_status = $request->contract_status;
      if ($request->hasFile('contract_attachment')) {
          if ($request->file('contract_attachment')->isValid()) {
              try {
                  $pdfName = time() . '.' . $request->contract_attachment->getClientOriginalExtension();
                  $request->contract_attachment->move('uploads/employee_contract', $pdfName);
                  $employee_contract->contract_attachment = $pdfName;
              } catch (Illuminate\Filesystem\FileNotFoundException $e) {

              }
          }
      }
      $employee_contract->save();
      $request->session()->flash('success', 'Add Employee Contract Successfully');
      return redirect('employees/' . $request->employee_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employee_contracts  $employee_contracts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $employee_contracts = Employee_contracts::findOrfail($id);
        $employee_contracts->delete();
        \Session::flash('success', 'Employee Deleted successfully');
        return redirect('employees/' . session()->get('employee_id'));
    }
}

