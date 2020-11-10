<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPayment extends Model
{
    protected $fillable = ['second_party_id', 'contract_id', 'currency_id', 'amount', 'year', 'month'];

    public function contract()
    {
      return $this->belongsTo(Contract::class, 'contract_id');
    }
    public function provider()
    {
      return $this->belongsTo(SecondParties::class, 'second_party_id', 'second_party_id');
    }
    public function currency()
    {
      return $this->belongsTo(Currency::class, 'currency_id');
    }
}
