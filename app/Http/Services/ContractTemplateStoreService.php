<?php

namespace App\Http\Services;

use App\Http\Repository\ContractTemplateRepository;

class ContractTemplateStoreService
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
    public function handle($request)
    {
        $ContractTemplate = $this->ContractTemplateRepository->create($request);

        return $ContractTemplate;
    }

}
