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
    preg_match_all('!\d+!', $request['duration'], $matches);

    $monthes = (int) $matches[0];
    
    if(strpos($request['duration'],'ear') !== false ) {
      $monthes = $monthes * 12;
    }

    $request = array_merge($request,[
      'renew_expire_date' => Carbon::parse($request['renew_expire_date'])->addMonth($monthes)->subDays(1)->format('Y-m-d')
    ]);

    $contractRenew->fill($request);

    $contractRenew->save();

    return $contractRenew;
  }
}
