<?php

namespace App\Observers;

use App\Contract;
use App\ContractItem;


class ContractItemObserver
{
    /**
     * Method saved
     * function work after save contract
     * @return void
     */
    public function created(ContractItem $contractItem)
    {
      if ($contractItem->fullapproves == 1) {
        $list_contract_items = ContractItem::where('contract_id', $contractItem->contract_id)->get();
        $list_contract_item_fullapproves = ContractItem::where('contract_id', $contractItem->contract_id)->where('fullapproves', 1)->get();
        if ($list_contract_items->count() == $list_contract_item_fullapproves->count()) {
          $list_contracts = Contract::where('id', $contractItem->contract_id)->first();
          $list_contracts->full_approves = 1;
          $list_contracts->save();
        }
      }
    }
}
