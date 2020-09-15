<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $table = 'revenus';
    protected $fillable = ['contract_id','year','month','source_type','source_id','amount','currency_id','serivce_type_id','is_collected','notes','reports'];

    public function contract()
    {
        return $this->belongsTo('App\Contract');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }

    public function serivce_type()
    {
        return $this->belongsTo('App\ServiceTypes');
    }

    public function source()
    {
        $source_type = $this->source_type;
        if($source_type == 'Operator'){
            return $this->belongsTo('App\Operator', 'source_id');
        }
        if($source_type == 'Aggregator'){
            return $this->belongsTo('App\Party', 'source_id', 'second_party_id');
        }
    }

    public function getSourceTypeAttribute($value)
    {
        switch ($value){
            case 1: return 'Operator';
            case 2: return 'Aggregator';
            default: return 'Error';
        }
    }

    public function getIsCollectedAttribute($value)
    {
        switch ($value){
            case 1: return 'Yes';
            case 2: return 'No';
            default: return 'Error';
        }
    }

    public function amount_services()
    {
        return $this->belongsToMany(contractservice::class,'amount_revenu','revenu_id','contract_service_id')->withPivot('id', 'amount');
    }

}
