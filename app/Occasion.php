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
class Occasion extends Model
{


    protected $table = 'occasions';
    protected $fillable = ['title','country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
