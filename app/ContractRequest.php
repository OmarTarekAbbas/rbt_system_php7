<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractRequest extends Model
{
    protected $fillable= [
      'contract_type',
      'contract_content_type',
      'title',
      'company_party_type',
      'company_authorized_signatory_name',
      'company_authorized_signatory_position',
      'company_authorized_signatory_mobile',
      'company_authorized_signatory_email',
      'company_project_manager_name',
      'company_project_manager_position',
      'company_project_manager_mobile',
      'company_project_manager_email',
      'client_type',
      'client_name',
      'client_party_type',
      'client_id',
      'client_id_image',
      'client_tc_image',
      'client_cr_image',
      'client_address',
      'client_authorized_signatory_name',
      'client_authorized_signatory_position',
      'client_authorized_signatory_mobile',
      'client_authorized_signatory_email',
      'client_project_manager_name',
      'client_project_manager_position',
      'client_project_manager_mobile',
      'client_project_manager_email',
      'content_type',
      'content_storage',
      'tracks_count',
      'clips_count',
      'images_count',
      'delivered_date',
      'receiver_name',
      'receiver_position',
      'receiver_mobile',
      'receiver_email',
      'advance_payment',
      'advance_payment_type',
      'advance_payment_amount',
      'advance_payment_details',
      'advance_payment_method',
      'installment_period_details',
      'first_party_percentage',
      'second_party_percentage',
      'third_party_percentage',
      'fourth_party_percentage',
      'legal_officer_name',
      'legal_officer_position',
      'legal_officer_mobile',
      'legal_officer_email',
      'objective',
      'country_title',
      'operator_title',
      'service_type_id',
      'second_party_type_id',
      'second_party_id',
      'first_party_id',
      'contract_code'
    ];

    public function secondpartytype()
    {
        return $this->belongsTo('App\SecondParty', 'second_party_type_id', 'id');
    }
    public function secondparty()
    {
        return $this->belongsTo('App\SecondParties', 'second_party_id', 'second_party_id');
    }
    public function servicetype()
    {
        return $this->belongsTo('App\ServiceTypes', 'service_type_id', 'id');
    }
    public function firstparty()
    {
        return $this->belongsTo('App\Firstpartie', 'first_party_id', 'id');
    }
    public function contracts()
    {
        return $this->hasOne('App\Contract', 'contract_code', 'contract_code');
    }

}
