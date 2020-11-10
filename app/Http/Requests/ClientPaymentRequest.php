<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientPaymentRequest extends Request
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
        'second_party_id' => "required|exists:second_parties,id",
        'contract_id' => "required|exists:contracts,id",
        'currency_id' => "required|exists:currencies,id",
        'amount' => "required",
        'year' => "required",
        'month' => "required"
       ];
    }
}
