<?php

namespace App;

use App\SecondParty;
use App\SecondParties;
use App\Traits\Filterable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Occasion.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:16:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Contract extends Model
{
    use Filterable;

    protected $table = 'contracts';
    protected $fillable = [
        'contract_code',
        'service_type_id',
        'contract_label',
        'first_party_id',
        'first_party_select',
        'second_party_id',
        'first_party',
        'second_party',
        'first_party_percentage',
        'second_party_percentage',
        'contract_date',
        'contract_duration_id',
        'renewal_status',
        'contract_status',
        'contract_expiry_date',
        'country_title',
        'operator_title',
        'copies',
        'pages',
        'contract_pdf',
        'contract_notes',
        'btn_annex',
        'btn_auturaisition',
        'btn_copyrights',
        'contract_signed_date',
        'entry_by_details',
        'entry_by',
        'second_party_type_id',
        'contract_type',
    ];

    protected $dates = ['contract_date', 'contract_expiry_date', 'contract_signed_date'];

    public function service_type()
    {
        return $this->belongsTo('App\ServiceTypes');
    }

    public function first_parties()
    {
        return $this->belongsTo(Firstpartie::class, 'first_party_id');
    }

    public function second_parties()
    {
        return $this->belongsTo(SecondParties::class, 'second_party_id');
    }

    public function second_party_type()
    {
        return $this->belongsTo(SecondParty::class, 'second_party_type_id');
    }

    public function contract_service()
    {
        return $this->hasMany('App\ContractService');
    }
    public function items()
    {
        return $this->hasMany(ContractItem::class);
    }
    public function content()
    {
        return $this->hasMany(Content::class);
    }
    public function authorization()
    {
        return $this->hasOne(Attachment::class)->where('attachment_type', 2);
    }
    public function annex()
    {
        return $this->hasOne(Attachment::class)->where('attachment_type', 1);
    }
    public function copyright()
    {
        return $this->hasOne(Attachment::class)->where('attachment_type', 3);
    }

    public function contractRenew()
    {
      return $this->hasMany(ContractRenew::class)->latest();
    }

    public function duration()
    {
        return $this->belongsTo(ContractDuration::class, 'contract_duration_id', 'contract_duration_id');
    }

    public function scopeActive($query)
    {
      return $query->where(function($contract){
                $contract->where('contract_expiry_date', ">", Carbon::now()->format("Y-m-d"));
                $contract->OrwhereHas('contractRenew', function($renew){
                  $renew->where('renew_expire_date', ">", Carbon::now()->format("Y-m-d"));
                });
              });
    }

    public function scopeWillExpire($query)
    {
      return $query->where(function($contract){
                $contract->whereBetween('contract_expiry_date', [Carbon::now()->addDays(1)->format("Y-m-d"), Carbon::now()->addMonths(3)->format("Y-m-d")]);
                $contract->OrwhereHas('contractRenew', function($renew){
                  $renew->whereBetween('renew_expire_date', [Carbon::now()->addDays(1)->format("Y-m-d"), Carbon::now()->addMonths(3)->format("Y-m-d")]);
                });
              });
    }

}
