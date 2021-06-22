<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['content_title','content_title_ar','content_type','remax','provider_id','internal_coding','path',
                          'user_id','image_preview','occasion_id','occasion_2_id','occasion_3_id','contract_id','start_date','expire_date','album','category'];

    protected $dates = ['start_date','expire_date'];

    ///////////////////set image///////////////////////////////
    public function setImagePreviewAttribute($value)
    {
        if(!is_numeric($value))
        {
        $img_name = time().rand(0,999).'.'.$value->getClientOriginalExtension();
        $value->move(base_path('/uploads/content/image'),$img_name);
        $this->attributes['image_preview']= $img_name ;
        }
        else{
        $this->attributes['image_preview']= $value.'.jpg' ;
        }
    }

    public function getImagePreviewAttribute($value)
    {
        return url('/uploads/content/image/'.$value);
    }

    ////////////////// set path ////////////////
    public function setPathAttribute($value)
    {
        if(!is_string($value))
        {
        $img_name = time().rand(0,999).'.'.$value->getClientOriginalExtension();
        $value->move(base_path('/uploads/content/'.date('Y-m-d')),$img_name);
        $this->attributes['path']= '/uploads/content/'.date('Y-m-d').'/'.$img_name ;
        }
        else
        {
        $this->attributes['path']= $value ;
        }
    }
    public function getPathAttribute($value)
    {
        return url($value);
    }

    public function provider()
    {
        return $this->belongsTo('App\SecondParties', 'provider_id', 'second_party_id');
    }

    public function occasion()
    {
        return $this->belongsTo('App\Occasion','occasion_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function contract()
    {
        return $this->belongsTo('App\Contract','contract_id');
    }
    public function rbts()
    {
        return $this->hasMany('App\Rbt');
    }

    public function scopeActive($builder)
    {
      return $builder->whereHas('contract', function($query){
              $query->where(function($contract){
                $contract->where('contract_expiry_date', ">", Carbon::now()->addMonths(3)->format("Y-m-d"));
                $contract->OrwhereHas('contractRenew', function($renew){
                  $renew->where('renew_expire_date', ">", Carbon::now()->addMonths(3)->format("Y-m-d"));
                });
              });
            });
    }

    public function scopeNextCommingExpire($builder)
    {
      return $builder->whereHas('contract', function($query){
              $query->where(function($contract){
                $contract->whereBetween('contract_expiry_date', [Carbon::now()->addDays(1)->format("Y-m-d"), Carbon::now()->addMonths(3)->format("Y-m-d")]);
                $contract->OrwhereHas('contractRenew', function($renew){
                  $renew->whereBetween('renew_expire_date', [Carbon::now()->addDays(1)->format("Y-m-d"), Carbon::now()->addMonths(3)->format("Y-m-d")]);
                });
              });
            });
    }

    public function scopeExpire($builder)
    {
      return $builder->whereHas('contract', function($query){
              $query->where(function($contract){
                $contract->where('contract_expiry_date', "<=", Carbon::now()->format("Y-m-d"));
                $contract->OrwhereHas('contractRenew', function($renew){
                  $renew->where('renew_expire_date', "<=", Carbon::now()->format("Y-m-d"));
                });
              });
            });
    }
}
