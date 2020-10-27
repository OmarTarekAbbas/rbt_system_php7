<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContractRequest extends Request
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
            "operator_title" => "",
            "country_title" => "",
            "contract_label" => "",
            "first_party_id" => "",
            "first_party_select" => "",
            "first_party_percentage" => "",
            "copies" => "",
            "pages" => "",
            "service_type_id" => "",
            "second_party_type_id" => "",
            "second_party_id" => "",
            "contract_date" => "",
            "contract_duration_id" => "",
            "renewal_status" => "",
            "contract_status" => "",
            "contract_expiry_date" => "",
            "contract_notes" => "",
            "contract_type" => "",
            "contract_pdf" => "mimes:pdf,docx,excel",
            "contract_notes" => "",
            "contract_signed_date" => "",
            "contract_code" => "",
            'first_party_signature' => '',
            'second_party_signature' => '',
            'first_party_seal' => '',
            'second_party_seal' => ''
       ];
    }
}
