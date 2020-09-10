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
class SecondParty extends Model
{


    protected $table = 'second_party_types';
    protected $fillable = [
        'second_party_type_title',
        'second_party_type_description'
    ];

    public function contract()
    {
        return $this->hasMany('App\Contract');
    }

}
