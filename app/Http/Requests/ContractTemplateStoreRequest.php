<?php

namespace App\Http\Requests;

use App\Http\Repository\ContractTemplateRepository;
use App\Http\Requests\Request;

class ContractTemplateStoreRequest extends Request
{
    /**
     * ContractTemplateRepository
     *
     * @var ContractTemplateRepository
     */
    private $ContractTemplateRepository;

    /**
     * __construct
     * inject needed data in constructor
     * @param  ContractTemplateRepository $ContractTemplateRepository
     * @return void
     */
    public function __construct(ContractTemplateRepository $ContractTemplateRepository)
    {
        $this->ContractTemplateRepository = $ContractTemplateRepository;
    }
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
        $rules['title'] = 'required';

        $rules['content_type'] = 'required';

        return $rules;
    }
}
