<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractTemplate extends Model
{
    protected $table = 'templates';

    protected $fillable = ['title', 'content_type'];

    public function items()
    {
        return $this->hasMany('App\ContractTemplateItem', 'template_id', 'id');
    }
}
