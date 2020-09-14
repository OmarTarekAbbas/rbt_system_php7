<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractDuration extends Model
{


    protected $table = 'contract_duration';
    protected $fillable = [
        'contract_duration_title',
    ];



}
