<?php

namespace App;

use App\SecondParty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Occasion.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:16:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class SecondParties extends Model
{


    protected $table = 'second_parties';
    protected $primaryKey = 'second_party_id';
    protected $fillable = [
        'second_party_type_id',
        'second_party_title',
        'second_party_joining_date',
        'second_party_terminate_date',
        'second_party_status',
        'second_party_identity',
        'second_party_cr',
        'second_party_tc',
        'entry_by',
        'second_party_signature',
        'second_party_seal',
        'email',
        'password',
        'image'
    ];

    public function type()
    {
        return $this->belongsTo(SecondParty::class, 'second_party_type_id', 'id');
    }

    public function getSecondPartyStatusAttribute($value)
    {
      switch ($value){
        case 1: return 'Working';
        case 0: return 'Tirminated';
        default: return 'Error';
      }
    }

    public function contracts()
    {
        return $this->hasMany('App\Contract', 'second_party_id', 'second_party_id');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value ? \Hash::make($value) : null;
    }

    public function getImageAttribute($value)
    {
      return $value ? url($value) : '';
    }

}
