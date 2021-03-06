<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentStoreRequest extends FormRequest
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
            'contract_id' => 'required',
            'attachment_type' => 'required',
            'attachment_title' => 'required',
            'attachment_date' => 'required',
            'attachment_expiry_date' => 'required',
            'attachment_pdf' => 'nullable',
            'attachment_status' => 'required',
            'notes' => 'nullable'
        ];
    }
}
