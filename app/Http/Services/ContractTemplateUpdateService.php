<?php

namespace App\Http\Services;

use App\Http\Repository\ContractTemplateRepository;

class ContractTemplateUpdateService
{
    /**
     * @var ContractTemplateRepository
     */
    private $ContractTemplateRepository;

    /**
     * __construct
     *
     * @param  ContractTemplateRepository $ContractTemplateRepository
     * @return void
     */
    public function __construct(ContractTemplateRepository $ContractTemplateRepository)
    {
        $this->ContractTemplateRepository = $ContractTemplateRepository;
    }
    /**
     * handle function that make update for setting
     * @param array $request
     * @return ContractTemplate
     */
    public function handle($request, $ContractTemplate)
    {
        $ContractTemplate->update($request);

        return $ContractTemplate;
    }

}
