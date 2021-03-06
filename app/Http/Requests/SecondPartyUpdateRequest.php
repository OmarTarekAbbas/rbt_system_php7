<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecondPartyUpdateRequest extends FormRequest
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
            'second_party_type_id' => 'required',
            'second_party_title' => 'required',
            'second_party_joining_date' => 'nullable',
            'second_party_terminate_date' => 'nullable',
            'second_party_status' => 'required',
            'second_party_identity' => 'nullable',
            'second_party_cr' => 'nullable',
            'second_party_tc' => 'nullable',
            'second_party_signature' => '',
            'second_party_seal' => '',
            'email' => '',
            'password' => '',
            'image' => ''
        ];
    }
}
