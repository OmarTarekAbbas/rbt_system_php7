<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractTemplateItem extends Model
{
    protected $fillable = ['contract_id', 'item', 'department_id'];

    public function user()
    {
        return $this->belongsTo('App\ContractTemplate', 'contract_id', 'id');
    }
}
