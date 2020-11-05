<?php
namespace App\Http\Services;

use App\Http\Repository\SecondPartyRepository;
use App\Http\Services\UploaderService;

class SecondPartyUpdateService
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
     * @param SecondParty $SecondParty
     * @return SecondPartyRepository
     */
    public function handle($request, $SecondParty)
    {
        if (isset($request['second_party_identity'])) {
            $second_party_identity = $this->UploaderService->upload($request['second_party_identity'], '/docs/');
            $request['second_party_identity'] = basename($second_party_identity);
        }
        if (isset($request['second_party_cr'])) {
            $second_party_cr = $this->UploaderService->upload($request['second_party_cr'], '/docs/');
            $request['second_party_cr'] = basename($second_party_cr);
        }
        if (isset($request['second_party_tc'])) {
            $second_party_tc = $this->UploaderService->upload($request['second_party_tc'], '/docs/');
            $request['second_party_tc'] = basename($second_party_tc);
        }
        if (isset($request['second_party_signature'])) {
          $second_party_signature = $this->UploaderService->upload($request['second_party_signature'], '/docs/signature');
          $request['second_party_signature'] = basename($second_party_signature);
        }
        if (isset($request['second_party_seal'])) {
          $second_party_seal = $this->UploaderService->upload($request['second_party_seal'], '/docs/signature');
          $request['second_party_seal'] = basename($second_party_seal);
        }

        return $SecondParty->update($request);
    }
}
