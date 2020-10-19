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
            "operator_title" => "required",
            "country_title" => "required",
            "contract_label" => "required",
            "first_party_id" => "required",
            "first_party_select" => "required",
            "first_party_percentage" => "required",
            "copies" => "required",
            "pages" => "required",
            "service_type_id" => "required",
            "second_party_type_id" => "required",
            "second_party_id" => "required",
            "contract_date" => "required",
            "contract_duration_id" => "required",
            "renewal_status" => "required",
            "contract_status" => "required",
            "contract_expiry_date" => "required",
            "contract_notes" => "required",
            "contract_type" => "required",
            "contract_pdf" => "mimes:pdf,docx,excel",
            "contract_notes" => "required",
            "contract_code" => ""
       ];
    }
}
