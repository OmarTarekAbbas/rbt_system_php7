<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Contract_Items_Approvids;
use App\ContractItem;
use Illuminate\Http\Request;
use Validator;

class ContractItemsApprovidsController extends Controller
{

  public function __construct()
  {
    $this->middleware(['auth', 'role:super_admin|legal|ceo'], ['except' => ['index']]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, $id)
  {

    $list_contract_items_sends = Contract_Items_Approvids::select('*', 'contract_items_approves.id AS id', 'contract_items.item as item', 'contracts.id as contract_id')
      ->where('contract_items_approves.contract_item_id', $id)
      ->join('contract_items', 'contract_items.id', '=', 'contract_items_approves.contract_item_id')
      ->join('contracts', 'contract_items.contract_id', '=', 'contracts.id')
      ->join('departments', 'departments.manager_id', '=', 'contract_items_approves.user_id')
      ->join('users', 'departments.manager_id', '=', 'users.id')
      ->get();
    return view('ContractItemsApproved.index', compact('list_contract_items_sends'));
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
  public function edit($id)
  {
    $list_contract_items_send = Contract_Items_Approvids::select('*', 'contract_items_approves.id AS id', 'contract_items.item as item', 'contracts.id as contract_id')
    ->where('contract_items_approves.id', $id)
    ->join('contract_items', 'contract_items.id', '=', 'contract_items_approves.contract_item_id')
    ->join('contracts', 'contract_items.contract_id', '=', 'contracts.id')
    ->join('departments', 'departments.manager_id', '=', 'contract_items_approves.user_id')
    ->first();
    
    if($list_contract_items_send->status === 2 || $list_contract_items_send->status === 1){ //1-notapprove 2-appaove 0-notaction
      return redirect('fullcontracts/'.$list_contract_items_send->contract_id);
    }else{
      return view('ContractItemsApproved.edit', compact('list_contract_items_send','id'));
    }
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
        $list_contract_item = ContractItem::where('id', $update_contract_items_send->contract_item_id)->first();
        $list_contract_item->fullapproves = 1;  // get contract id
        if ($list_contract_item->save()) {
          // get all items related to this contract id
          // check all these items are fullapproves  => this contract->fullapproved =
            $list_contract_items = ContractItem::where('contract_id', $list_contract_item->contract_id)->get();
            $list_contract_item_fullapproves = ContractItem::where('contract_id', $list_contract_item->contract_id)->where('fullapproves', 1)->get();
            if ($list_contract_items->count() == $list_contract_item_fullapproves->count()) {
              $list_contracts = Contract::where('id', $list_contract_item->contract_id)->first();
              $list_contracts->full_approves = 1;
              $list_contracts->save();
            }

        }
      }
    }

    \Session::flash('success', 'Contract Items Approvids updated successfully');
    return redirect('contract_items_send/' . $update_contract_items_send->contract_item_id . '/approves');
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
