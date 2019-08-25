<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Operator.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:14:57am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Operator extends Model
{
	
	
    protected $table = 'operators';

	
	public function country()
	{
		return $this->belongsTo('App\Country','country_id');
	}

	
}
