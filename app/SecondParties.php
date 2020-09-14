<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Occasion.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:16:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class SecondParties extends Model
{


    protected $table = 'second_parties';
    protected $fillable = [
        'second_party_type_id',
        'second_party_title',
        'second_party_joining_date',
        'second_party_terminate_date',
        'second_party_status',
        'second_party_identity',
        'second_party_cr',
        'second_party_tc',
        'entry_by',
    ];



}
