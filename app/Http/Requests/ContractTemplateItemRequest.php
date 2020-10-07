<?php

namespace App\Http\Requests;

use App\Http\Repository\ContractTemplateItemRepository;
use App\Http\Requests\Request;

class ContractTemplateItemRequest extends Request
{
    /**
     * ContractTemplateItemRepository
     *
     * @var ContractTemplateItemRepository
     */
    private $ContractTemplateItemRepository;

    /**
     * __construct
     * inject needed data in constructor
     * @param  ContractTemplateItemRepository $ContractTemplateItemRepository
     * @return void
     */
    public function __construct(ContractTemplateItemRepository $ContractTemplateItemRepository)
    {
        $this->ContractTemplateItemRepository = $ContractTemplateItemRepository;
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
