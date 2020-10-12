<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractTemplateItem extends Model
{
    protected $table = 'template_items';

    protected $fillable = ['template_id', 'item', 'department_id'];

    public function contract()
    {
        return $this->belongsTo('App\ContractTemplate', 'template_id', 'id');
    }
}
