<?php

namespace App\Http\Controllers;

use App\Contract_Items_Approvids;
use App\ContractItem;
use Illuminate\Http\Request;
use Validator;

class ContractItemsApprovidsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {

    $list_contract_items_sends = Contract_Items_Approvids::select('*', 'contract_items_approves.id AS id', 'contract_items.item as item', 'contracts.id as contract_id')
      ->join('contract_items', 'contract_items.id', '=', 'contract_items_approves.contract_item_id')
      ->join('contracts', 'contract_items.contract_id', '=', 'contracts.id')
      ->join('departments', 'departments.id', '=', 'contract_items_approves.user_id')
      ->join('users', 'departments.manager_id', '=', 'users.id')
      ->get();
    $contract_items_send_id = Contract_Items_Approvids::select('*', 'contract_items_approves.id AS id', 'contract_items.item as item', 'contracts.id as contract_id')
      ->join('contract_items', 'contract_items.id', '=', 'contract_items_approves.contract_item_id')
      ->join('contracts', 'contract_items.contract_id', '=', 'contracts.id')
      ->join('departments', 'departments.id', '=', 'contract_items_approves.user_id')
      ->join('users', 'departments.manager_id', '=', 'users.id')
      ->first();
    return view('ContractItemsApproved.index', compact('list_contract_items_sends', 'contract_items_send_id'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Contract_Items_Approvids  $contract_Items_Approvids
   * @return \Illuminate\Http\Response
   */
  public function show(Contract_Items_Approvids $id)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Contract_Items_Approvids  $contract_Items_Approvids
   * @return \Illuminate\Http\Response
   */
  public function edit(Contract_Items_Approvids $id)
  {
    $list_contract_items_send = Contract_Items_Approvids::select('*', 'contract_items_approves.id AS id', 'contract_items.item as item', 'contracts.id as contract_id')
      ->whereIn('contract_items_approves.id', $id)
      ->join('contract_items', 'contract_items.id', '=', 'contract_items_approves.contract_item_id')
      ->join('contracts', 'contract_items.contract_id', '=', 'contracts.id')
      ->join('departments', 'departments.id', '=', 'contract_items_approves.user_id')
      ->first();

    return view('ContractItemsApproved.edit', compact('list_contract_items_send'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Contract_Items_Approvids  $contract_Items_Approvids
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(), [
      'status' => 'required',
    ]);
    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    }

    $update_contract_items_send = Contract_Items_Approvids::findOrFail($id);
    $update_contract_items_send->status = $request->status;
    if ($update_contract_items_send->save()) {
      $all_contract_item = Contract_Items_Approvids::where('contract_item_id', $update_contract_items_send->contract_item_id)->get();
      $all_without_current = Contract_Items_Approvids::where('contract_item_id', $update_contract_items_send->contract_item_id)->where('status', 2)->get();
      if ($all_contract_item->count() == $all_without_current->count()) {
        $list_contract_item_id = ContractItem::where('id', $update_contract_items_send->contract_item_id)->first();
        $list_contract_item_id->fullcontract = 1;
        $list_contract_item_id->save();
      }
    }

    \Session::flash('success', 'Contract Items Approvids updated successfully');
    return redirect('contract_items_send/');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Contract_Items_Approvids  $contract_Items_Approvids
   * @return \Illuminate\Http\Response
   */
  public function destroy(Contract_Items_Approvids $contract_Items_Approvids)
  {
    //
  }
}
