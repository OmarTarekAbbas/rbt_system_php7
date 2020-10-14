<?php

namespace App\Http\Controllers;

use App\Contract_Items_Approvids;
use Illuminate\Http\Request;

class ContractItemsApprovidsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {

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
    $list_contract_items_send = Contract_Items_Approvids::select('*','contract_items_approvids.id AS id','contract_items.item as item','contracts.id as contract_id')
    ->whereIn('contract_items_approvids.id',$id)
    ->join('contract_items','contract_items.id','=','contract_items_approvids.contract_item_id')
    ->join('contracts','contract_items.contract_id','=','contracts.id')
    ->join('departments','departments.id','=','contract_items_approvids.user_id')
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
  public function update(Request $request, Contract_Items_Approvids $contract_Items_Approvids)
  {
    //
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

  public function approve($id)
  {
    Contract_Items_Approvids::find($id)->update(['status' => 1]);
    return redirect()->back();
  }
  public function notapprove($id)
  {
    Contract_Items_Approvids::find($id)->update(['status' => 0]);
    return redirect()->back();
  }
}
