<?php
namespace App\Http\Services;

use App\Http\Services\UploaderService;
use App\Http\Repository\AttachmentRepository;

class AttachmentStoreService
{

    /**
     * AttachmentRepository
     * @var SecondPartyRepository $AttachmentRepository
     */
    private $AttachmentRepository;
    /**
     * UploaderService
     * @var UploaderService $UploaderService
     */
    private $UploaderService;

    /**
     * __construct
     * @param $AttachmentRepository
     */
    public function __construct(
      AttachmentRepository $AttachmentRepository,
      UploaderService $UploaderService
    )
    {
        $this->AttachmentRepository = $AttachmentRepository;
        $this->UploaderService = $UploaderService;
    }

    /**
     * handle
     * @param array $request
     * @return AttachmentRepository
     */
    public function handle($request)
    {
        $second_party_identity = $this->UploaderService->upload($request['second_party_identity'], '/secondparty/id/');
        $second_party_cr = $this->UploaderService->upload($request['second_party_cr'], '/secondparty/cr/');
        $second_party_tc = $this->UploaderService->upload($request['second_party_tc'], '/secondparty/tc/');

        $request['second_party_identity'] = $second_party_identity;
        $request['second_party_cr'] = $second_party_cr;
        $request['second_party_tc'] = $second_party_tc;

        return $this->AttachmentRepository->create($request);
    }
}
