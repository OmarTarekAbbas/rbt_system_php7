<?php

namespace App\Observers;

use App\Constants\CeoRenewStatus;
use App\Http\Services\ContractRenewService;
use App\ContractRenew;

class ContractRenewObserver
{
    /**
    * contractRenewService
    * @var ContractRenewService $contractRenewService
    */
    private $contractRenewService;
    /**
     * Method __construct
     *
     * @param ContractRenewService $contractRenewService
     *
     * @return void
     */
    public function __construct(ContractRenewService $contractRenewService)
    {
      $this->contractRenewService = $contractRenewService;
    }
    /**
     * Method saved
     * function work after save contract
     * @return void
     */
    public function saved(ContractRenew $contractRenew)
    {
      if ($contractRenew->isDirty('ceo_renew') && $contractRenew->ceo_renew == CeoRenewStatus::RENEW) {
        $data['contract_id']       = $contractRenew->contract->id;
        $data['renew_start_date']  = request()->get('renew_start_date');
        $data['renew_expire_date'] = request()->get('renew_expire_date');
        $data['renew_duration_id'] = request()->get('renew_duration_id');
        $this->contractRenewService->handle($data);
      }
    }
}
