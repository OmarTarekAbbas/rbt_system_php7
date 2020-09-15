<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    protected $fillable = ['event_title','event_color','event_code','event_status','country_id','aggregator_id',
                          'operator_id','occasion_id','aggregator_support','operator_support','promotion_support','entry_by','event_start_date','event_end_date'];

    protected $dates  = ['event_start_date','event_end_date'];

    public function providers()
    {
        return $this->belongsToMany('App\Provider','provider_contents','provider_id','roadmap_id')->withPivot(['content_id','rbt_track_specs','id']);
    }
}
