<?php

namespace App;

use App\Traits\Filterable;
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

  use Filterable;
  protected $table = 'reports';
	protected $fillable = ['year','month','classification','code','rbt_name','rbt_id','download_no','total_revenue','revenue_share','operator_id','second_party_id','aggregator_id','contract_id','your_revenu','client_revenu'];

  public function getMonthAttribute($value)
  {
    return date("F", strtotime("$value/1/1"));
  }
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
		return $this->belongsTo(SecondParties::class, 'second_party_id', 'second_party_id');
	}
  public function contract()
	{
		return $this->belongsTo(Contract::class);
	}
	public function aggregator()
	{
		return $this->belongsTo('App\Aggregator');
	}
	public function rbt()
	{
		return $this->belongsTo('App\Rbt', 'rbt_id');
	}
}
