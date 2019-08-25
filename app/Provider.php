<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Provider.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:15:31am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Provider extends Model
{
	
	
    protected $table = 'providers';
    protected $fillable = ['title'] ;
	
}
