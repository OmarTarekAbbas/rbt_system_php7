<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Firstpartie extends Model
{


    protected $table = 'first_parties';
    protected $fillable = [
        'first_party_title',
        'first_party_signature',
        'first_party_seal',
        'first_party_joining_date'
    ];
    protected $dates  = ['first_party_joining_date'];


}
