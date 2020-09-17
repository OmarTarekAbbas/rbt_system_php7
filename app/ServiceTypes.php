<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Occasion.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:16:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ServiceTypes extends Model
{

    protected $table = 'service_types';
    protected $fillable = [
        'service_type_title',
    ];

    public function contract()
    {
        return $this->hasMany('App\Contract');
    }

}
