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
    $list_contract_items_sends = Contract_Items_Approvids::select('*','contract__items__approvids.id AS id','contract_items.item as item')
    ->join('contract_items','contract_items.id','=','contract__items__approvids.contract_item_id')
    ->join('departments','departments.id','=','contract__items__approvids.user_id')
    ->get();
    //dd($list_contract_items_sends);
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
  public function show(Contract_Items_Approvids $contract_Items_Approvids)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Contract_Items_Approvids  $contract_Items_Approvids
   * @return \Illuminate\Http\Response
   */
  public function edit(Contract_Items_Approvids $contract_Items_Approvids)
  {
    //
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
}
