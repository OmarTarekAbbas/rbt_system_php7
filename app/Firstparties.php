<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Firstparties extends Model
{


    protected $table = 'first_parties';
    protected $fillable = [
        'first_party_title',
        'first_party_joining_date'
    ];



}
