<?php


namespace App\Http\Services;

use App\Http\Repository\ContractRequestRepository;
use Illuminate\Http\UploadedFile;

class ContractRequestService
{
    /**
     * @var IMAGE_PATH
     */
    const Client_ID_Image = '/contract_requests/client_id';
    /**
     * @var IMAGE_PATH
     */
    const Client_TC = '/contract_requests/client_tc';
    /**
     * @var IMAGE_PATH
     */
    const Client_CR = '/contract_requests/client_cr';
    /**
     * @var ContractRequestRepository
     */
    private $contractRequestRepository;

    /**
     * __construct
     *
     * @param  ContractRequestRepository $contractRequestRepository
     */
    public function __construct(ContractRequestRepository $contractRequestRepository, UploaderService $UploaderService)
    {
        $this->UploaderService  = $UploaderService;
        $this->contractRequestRepository  = $contractRequestRepository;
    }
    /**
     * handle function that make update for contractRequest
     * @param array $request
     * @return ContractRequest
     */
    public function handle($request, $contractRequestId = null)
    {
        $contractRequest = $this->contractRequestRepository;

        if($contractRequestId) {
            $contractRequest = $this->contractRequestRepository->find($contractRequestId);
        }

        $request = array_merge($request,[
          'delivered_date' => date('Y-m-d',strtotime($request['delivered_date'])),
          "operator_title" => implode(",", $request['operator_title']),
          "country_title"  => implode(",", $request['country_title'])
        ]);

        if (isset($request['client_id_image'])) {
          $request = array_merge($request, [
            "client_id_image"  =>  $this->handleFile($request['client_id_image'] , self::Client_ID_Image)
          ]);
        }

        if (isset($request['client_tc_image'])) {
          $request = array_merge($request, [
            "client_tc_image"  =>  $this->handleFile($request['client_tc_image'] , self::Client_TC)
          ]);
        }

        if (isset($request['client_cr_image'])) {
          $request = array_merge($request, [
            "client_cr_image"  =>  $this->handleFile($request['client_cr_image'] , self::Client_CR)
          ]);
        }

        $contractRequest->fill($request);

        $contractRequest->save();

    	return $contractRequest;
    }

     /**
     * handle function that make update for role
     * @param UploadedFile $value
     * @param string $path
     * @return string
     */
    public function handleFile(UploadedFile $value, $path)
    {
      return $this->UploaderService->upload($value, $path);
    }

}
