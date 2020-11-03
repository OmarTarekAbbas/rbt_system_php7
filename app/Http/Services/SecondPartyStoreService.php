<?php
namespace App\Http\Services;

use App\Http\Repository\SecondPartyRepository;
use App\Http\Services\UploaderService;

class SecondPartyStoreService
{

    /**
     * SecondPartyRepository
     * @var SecondPartyRepository $SecondPartyRepository
     */
    private $SecondPartyRepository;
    /**
     * UploaderService
     * @var UploaderService $UploaderService
     */
    private $UploaderService;

    /**
     * __construct
     * @param $SecondPartyRepository
     */
    public function __construct(
        SecondPartyRepository $SecondPartyRepository,
        UploaderService $UploaderService
    ) {
        $this->SecondPartyRepository = $SecondPartyRepository;
        $this->UploaderService = $UploaderService;
    }

    /**
     * handle
     * @param array $request
     * @return SecondPartyRepository
     */
    public function handle($request)
    {
        if (isset($request['second_party_identity'])) {
            $second_party_identity = $this->UploaderService->upload($request['second_party_identity'], '');
            $request['second_party_identity'] = substr($second_party_identity,8);
        }
        if (isset($request['second_party_cr'])) {
            $second_party_cr = $this->UploaderService->upload($request['second_party_cr'], '');
            $request['second_party_cr'] = substr($second_party_cr,8);
        }
        if (isset($request['second_party_tc'])) {
            $second_party_tc = $this->UploaderService->upload($request['second_party_tc'], '');
            $request['second_party_tc'] = substr($second_party_tc,8);
        }
        if (isset($request['second_party_signature'])) {
          $second_party_signature = $this->UploaderService->upload($request['second_party_signature'], '');
          $request['second_party_signature'] = substr($second_party_signature,8);
        }
        if (isset($request['second_party_seal'])) {
          $second_party_signature = $this->UploaderService->upload($request['second_party_seal'], '');
          $request['second_party_seal'] = substr($second_party_signature,8);
        }

        return $this->SecondPartyRepository->create($request);
    }
}
