<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractItem extends Model
{
  protected $table = 'contract_items';

  protected $fillable = ['item', 'department_ids', 'contract_id', 'fullapproves'];

  public function contract()
  {
    return $this->belongsTo(Contract::class);
  }
}
