<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['content_title','content_type','provider_id','internal_coding','path',
                          'user_id','image_preview','occasion_id','contract_id'];

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
        return $this->belongsTo('App\Provider','provider_id');
    }
    public function occasion()
    {
        return $this->belongsTo('App\Occasion','occasion_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
