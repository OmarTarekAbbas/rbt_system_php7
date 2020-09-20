<?php

namespace App\Http\Requests;

use App\Http\Repository\SecondPartyTypeRepository;
use App\Http\Requests\Request;

class SecondPartyTypeStoreRequest extends Request
{
    /**
     * SecondPartyTypeRepository
     *
     * @var SecondPartyTypeRepository
     */
    private $SecondPartyTypeRepository;

    /**
     * __construct
     * inject needed data in constructor
     * @param  SecondPartyTypeRepository $SecondPartyTypeRepository
     * @return void
     */
    public function __construct(SecondPartyTypeRepository $SecondPartyTypeRepository)
    {
        $this->SecondPartyTypeRepository = $SecondPartyTypeRepository;
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
        $rules['second_party_type_title'] = 'required';

        $rules['second_party_type_description'] = 'required';

        return $rules;
    }
}
