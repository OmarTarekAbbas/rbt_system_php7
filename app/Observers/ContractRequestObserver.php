<?php

namespace App\Observers;

use App\Firstpartie;
use App\ContractRequest;

class ContractRequestObserver
{
    public function saved(ContractRequest $ContractRequest)
    {
        if(!$ContractRequest->isDirty('contract_code')){
          $serviceTypeId = $ContractRequest->service_type_id;
          $first_party_title = strtolower(substr(Firstpartie::find($ContractRequest->first_party_id)->first_party_title,0,2));
          $second_party_id = $ContractRequest->second_party_id;
          $second_party_type_id = $ContractRequest->second_party_type_id;
          $contract_id = $ContractRequest->id;
          $ContractRequest->contract_code = $serviceTypeId.'-'.$first_party_title.'-'.$second_party_id.'-'.$second_party_type_id.'-'.$contract_id;

          $ContractRequest->save();
        }
    }
}
