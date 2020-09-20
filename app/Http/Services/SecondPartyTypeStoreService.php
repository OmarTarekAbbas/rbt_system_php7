<?php

namespace App\Http\Services;

use App\Http\Repository\SecondPartyTypeRepository;

class SecondPartyTypeStoreService
{
    /**
     * @var SecondPartyTypeRepository
     */
    private $SecondPartyTypeRepository;

    /**
     * __construct
     *
     * @param  SecondPartyTypeRepository $SecondPartyTypeRepository
     * @return void
     */
    public function __construct(SecondPartyTypeRepository $SecondPartyTypeRepository)
    {
        $this->SecondPartyTypeRepository = $SecondPartyTypeRepository;
    }
    /**
     * handle function that make update for setting
     * @param array $request
     * @return SecondPartyType
     */
    public function handle($request)
    {
        $SecondPartyType = $this->SecondPartyTypeRepository->create($request);

        return $SecondPartyType;
    }

}
