<?php
namespace App\Http\Services;

use App\Http\Services\UploaderService;
use App\Http\Repository\SecondPartyRepository;

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
    )
    {
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
        if(array_key_exists('second_party_identity', $request)){
          $second_party_identity = $this->UploaderService->upload($request['second_party_identity'], '/secondparty/id/');
          $request['second_party_identity'] = $second_party_identity;
        }
        if(array_key_exists('second_party_cr', $request)){
          $second_party_cr = $this->UploaderService->upload($request['second_party_cr'], '/secondparty/cr/');
          $request['second_party_cr'] = $second_party_cr;
        }
        if(array_key_exists('second_party_tc', $request)){
          $second_party_tc = $this->UploaderService->upload($request['second_party_tc'], '/secondparty/tc/');
          $request['second_party_tc'] = $second_party_tc;
        }
        return $SecondParty->update($request);
    }
}
