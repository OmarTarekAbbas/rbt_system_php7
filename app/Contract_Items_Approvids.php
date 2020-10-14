<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract_Items_Approvids extends Model
{
  protected $table = 'contract_items_approves';

  protected $fillable = ['user_id', 'contract_item_id', 'status'];
}
