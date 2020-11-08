<?php

namespace App\Http\Controllers;

use App\Contract_Items_Approvids;
use App\ContractItem;
use Illuminate\Http\Request;
use App\Department;
use App\User;
use App\Notification;
use Validator;

class DepartmentController extends Controller
{

  public function __construct()
  {
    $this->get_privilege();
  }

  public function index()
  {
    $departments = Department::all();
    // return $department;
    return view('department.index', compact('departments'));
  }


  public function create()
  {
    $managers = User::all();
    return view('department.create', compact('managers'));
  }


  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'title' => 'required',
      'email' => 'required|email',
      'manager_id' => 'required'
    ]);
    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    }

    $department = Department::create($request->all());
    \Session::flash('success', 'Department updated successfully');
    return redirect('department');
  }


  public function edit($id)
  {

    $department = Department::findOrfail($id);
    $managers = User::all();

    return view('department.edit', compact('department', 'managers'));
  }


  public function update($id, Request $request)
  {
    $validator = Validator::make($request->all(), [
      'title' => 'required',
      'email' => 'required|email',
      'manager_id' => 'required'
    ]);
    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    }
    $department = Department::find($id)->update($request->all());
    \Session::flash('success', 'Department updated successfully');
    return redirect('department');
  }


  public function destroy($id)
  {
    if (\Auth::user()->hasRole('super_admin', 'ceo')) {
      # code...
      $department = Department::findOrfail($id);

      $department->delete();

      \Session::flash('success', 'Department Deleted successfully');

      return redirect('department');
    } else {
      return back();
    }
  }
}
