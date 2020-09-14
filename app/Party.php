<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $table = 'second_parties';
    protected $fillable = ['second_party_type_id','second_party_title','second_party_joining_date','second_party_terminate_date','second_party_status','second_party_identity','second_party_cr', 'second_party_tc'];

}
