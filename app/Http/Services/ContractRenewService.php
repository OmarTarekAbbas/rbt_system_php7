<?php


namespace App\Http\Services;

use App\ContractRenew;
use Carbon\Carbon;

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


    $request = array_merge($request,[
      'renew_start_date' => Carbon::parse($request['renew_start_date'])->format('Y-m-d'),
      'renew_expire_date' => Carbon::parse($request['renew_expire_date'])->format('Y-m-d')
    ]);

    $contractRenew->fill($request);

    $contractRenew->save();

    return $contractRenew;
  }
}
