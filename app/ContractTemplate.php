<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractTemplate extends Model
{
    protected $fillable = ['title', 'content_type'];

    public function items()
    {
        return $this->hasMany('App\ContractTemplateItem', 'contract_id', 'id');
    }
}
