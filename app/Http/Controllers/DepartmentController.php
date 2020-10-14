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
      'email' => 'required|email|unique:departments,email',
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
      'email' => 'required|email|unique:departments,email,' . $id,
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
    if (\Auth::user()->hasRole('super_admin')) {
      # code...
      $department = Department::findOrfail($id);

      $department->delete();

      \Session::flash('success', 'Department Deleted successfully');

      return redirect('department');
    } else {
      return back();
    }
  }


  public function contract_items_send_email()
  {
    $contract_item_id = 1;
    $contract_item_message = ContractItem::where('id', $contract_item_id)->first();
    $subject = "new contract is created";
    $message  = '<!DOCTYPE html>
      <html lang="en">
          <head>
          </head>
          <body>
          ' . $contract_item_message->item . '
      </body>
      </html>';
    $department_ids = array(1, 2, 3);
    $departments = Department::whereIn('id', $department_ids)->get();
    foreach ($departments as $department) {
      $resend_email = array(
        $department->email,
      );
      $this->sendEmail($subject, $message, $resend_email);
    }

    $contract_items_approvids = new Contract_Items_Approvids();
    $contract_items_approvids->user_id = $department->manager->id;
    $contract_items_approvids->contract_item_id = $contract_item_id;
    if ($contract_items_approvids->save()) {
      $Url = url('contract_items_send/' . $contract_items_approvids->id . '/show');
      $notification = new Notification();
      $notification->notifier_id = 1;
      $notification->notified_id = $department->manager->id;
      $notification->subject = 'Add New Contract Item Message You Can Follow It From This Link';
      $notification->link = $Url;
      $notification->seen = 0;
      $notification->save();
    }
    return 'done';
  }

  public function sendEmail($subject, $message, $resend_email)
  {
    $email = implode(',', $resend_email);
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: ivas_system';
    @mail($email, $subject, $message, $headers);
  }
}
