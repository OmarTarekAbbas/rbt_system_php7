<?php
namespace App\Http\Services;

use App\Http\Repository\AttachmentRepository;
use App\Http\Services\UploaderService;
use App\Contract;

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
    ) {
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
        $attachment_pdf = $this->UploaderService->upload($request['attachment_pdf'], '/attachments/pdf');
        $request['attachment_pdf'] = $attachment_pdf;

        $contract = Contract::find($request['contract_id']);
        if ($request['attachment_type'] == 1) {
          $shortCode = 'AN';
        } elseif ($request['attachment_type'] == 2) {
          $shortCode = 'AL';
        } elseif ($request['attachment_type'] == 3) {
          $shortCode = 'CR';
        }
        $request['attachment_code'] = "$shortCode/$contract->contract_code/".time();
        $request['contract_expiry_date'] = $contract->contract_expiry_date;

        return $this->AttachmentRepository->create($request);
    }
}
