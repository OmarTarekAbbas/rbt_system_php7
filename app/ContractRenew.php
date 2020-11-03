<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractRenew extends Model
{
    protected $fillable = ['contract_id', 'renew_start_date', 'renew_expire_date', 'ceo_renew', 'renew_duration_id'];
    // protected $dates    = ['renew_start_date', 'renew_expire_date'];

    public function contract()
    {
      return $this->belongsTo(Contract::class);
    }

    public function duration()
    {
        return $this->belongsTo(ContractDuration::class, 'renew_duration_id', 'contract_duration_id');
    }
}
