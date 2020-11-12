<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContractRequestRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       return [
        'contract_type' => "required",
        'contract_content_type' => "required",
        'title' => "required",
        'company_party_type' => "required",
        'company_authorized_signatory_name' => "required",
        'company_authorized_signatory_position' => "required",
        'company_authorized_signatory_mobile' => "required",
        'company_authorized_signatory_email' => "required",
        'company_project_manager_name' => "required",
        'company_project_manager_position' => "required",
        'company_project_manager_mobile' => "required",
        'company_project_manager_email' => "required",
        'second_party_type_id' => "required",
        'second_party_id' => "required",
        'client_party_type' => "required",
        'client_id' => "required",
        'client_id_image' => "nullable",
        'client_tc_image' => "nullable",
        'client_cr_image' => "nullable",
        'client_address' => "required",
        'client_authorized_signatory_name' => "required",
        'client_authorized_signatory_position' => "required",
        'client_authorized_signatory_mobile' => "required",
        'client_authorized_signatory_email' => "required",
        'client_project_manager_name' => "required",
        'client_project_manager_position' => "required",
        'client_project_manager_mobile' => "required",
        'client_project_manager_email' => "required",
        'content_type' => "required",
        'content_storage' => "required",
        'tracks_count' => "",
        'clips_count' => "",
        'images_count' => "",
        'delivered_date' => "required",
        'receiver_name' => "required",
        'receiver_position' => "required",
        'receiver_mobile' => "required",
        'receiver_email' => "required",
        'advance_payment' => "required",
        'advance_payment_type' => "required",
        'advance_payment_amount' => "required",
        'advance_payment_details' => "required",
        'advance_payment_method' => "required",
        'installment_period_details' => "required",
        'first_party_percentage' => "",
        'second_party_percentage' => "",
        'third_party_percentage' => "",
        'fourth_party_percentage' => "",
        'legal_officer_name' => "required",
        'legal_officer_position' => "required",
        'legal_officer_mobile' => "required",
        'legal_officer_email' => "required",
        'objective' => "required",
        'country_title' => "required",
        'operator_title' => "required",
        'service_type_id' => "required",
        'first_party_id' => "required"
       ];
    }
}
