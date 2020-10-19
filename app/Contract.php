<?php

namespace App;

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
        'entry_by_details',
        'entry_by',
        'second_party_type_id',
        'contract_type'
    ];

    public function service_type()
    {
        return $this->belongsTo('App\ServiceTypes');
    }

    public function contract_service()
    {
        return $this->hasMany('App\ContractService');
    }
    public function items()
    {
        return $this->hasMany(ContractItem::class);
    }
    public function authorization()
    {
        return $this->hasOne(Attachment::class)->where('attachment_type', 1);
    }
    public function annex()
    {
        return $this->hasOne(Attachment::class)->where('attachment_type', 2);
    }
    public function copyright()
    {
        return $this->hasOne(Attachment::class)->where('attachment_type', 3);
    }

}
