<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractRenew extends Model
{
    protected $fillable = ['contract_id', 'renew_start_date', 'renew_expire_date', 'ceo_renew'];

    public function contract()
    {
      return $this->belongsTo(Contract::class);
    }
}
