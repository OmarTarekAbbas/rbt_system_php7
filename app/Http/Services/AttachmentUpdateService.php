<?php
namespace App\Http\Services;

use App\Http\Services\UploaderService;
use App\Http\Repository\AttachmentRepository;

class AttachmentUpdateService
{

    /**
     * AttachmentRepository
     * @var AttachmentRepository $AttachmentRepository
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
     * @param Attachment $Attachment
     * @return AttachmentRepository
     */
    public function handle($request, $Attachment)
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
        return $Attachment->update($request);
    }
}
