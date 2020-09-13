<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Percentage extends Model
{


    protected $table = 'percentage';
    protected $fillable = [
        'percentage',
    ];



}
