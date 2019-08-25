<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Report.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:28:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Report extends Model
{
	
	
    protected $table = 'reports';
	protected $fillable = ['year','month','classification','code','rbt_name','rbt_id','download_no','total_revenue','revenue_share','operator_id','provider_id','aggregator_id'];
	
	public function currency()
	{
		return $this->belongsTo('App\Currency','currency_id');
	}

	
	public function type()
	{
		return $this->belongsTo('App\Type','type_id');
	}

	public function operator()
	{
		return $this->belongsTo('App\Operator');
	}
	public function provider()
	{
		return $this->belongsTo('App\Provider');
	}
	public function aggregator()
	{
		return $this->belongsTo('App\Aggregator');
	}
}
