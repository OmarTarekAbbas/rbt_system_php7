<?php


namespace App\Http\Services;

use App\ContractRenew;

class ContractRenewService
{
  /**
   * handle function that make update for contractRenew
   * @param array $request
   * @return ContractRenew
   */
  public function handle($request, $contractRenewId = null)
  {
    $contractRenew = new ContractRenew();

    if ($contractRenewId) {
      $contractRenew = ContractRenew::find($contractRenewId);
    }

    $contractRenew->fill($request);

    $contractRenew->save();

    return $contractRenew;
  }
}
