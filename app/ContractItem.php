<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractItem extends Model
{
  protected $table = 'contract_items';

  protected $fillable = ['title', 'content_type'];
}
