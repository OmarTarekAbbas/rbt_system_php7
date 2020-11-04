<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rbt.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:20:35am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Rbt extends Model
{


    protected $table = 'rbts';
	protected $fillable = ['track_title_en','track_title_ar','artist_name_en','artist_name_ar',
						   'album_name','code','social_media_code','owner','track_file','operator_id',
               'provider_id','occasion_id','aggregator_id','type','internal_coding','content_id','start_date','expire_date'] ;

  protected $dates = ['start_date','expire_date'];

	public function provider()
	{
		return $this->belongsTo(SecondParties::class, 'provider_id', 'second_party_id');
	}


	public function operator()
	{
		return $this->belongsTo('App\Operator','operator_id');
	}


	public function occasion()
	{
		return $this->belongsTo('App\Occasion','occasion_id');
	}


	public function aggregator()
	{
		return $this->belongsTo('App\Aggregator','aggregator_id');
    }

    public function content()
	{
		return $this->belongsTo('App\Content','content_id');
	}


}
