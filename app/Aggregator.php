<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Aggregator.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:11:57am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Aggregator extends Model
{
    protected $table = 'aggregators';

		public function user()
		{
			return $this->hasOne('App\User');
		}

}
