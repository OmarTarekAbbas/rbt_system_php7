<?php


namespace App\Http\Services;

use App\Firstpartie;
use App\ContractRequest;
use Illuminate\Http\UploadedFile;
use App\Http\Repository\ContractRequestRepository;

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

        $contractRequest = new ContractRequest();

        if ($contractRequestId) {
          $contractRequest = ContractRequest::find($contractRequestId);
        }

        $request = array_merge($request,[
          'delivered_date' => date('Y-m-d',strtotime($request['delivered_date'])),
          "operator_title" => implode(",", $request['operator_title']),
          "country_title"  => implode(",", $request['country_title']),
          "content_type"  => implode(",", $request['content_type']),
          "content_storage"  => implode(",", $request['content_storage'])
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

        $serviceTypeId = $request['service_type_id'];
        $first_party_title = Firstpartie::find($request['first_party_id'])->first_party_title;
        $second_party_id = $request['second_party_id'];
        $second_party_type_id = $request['second_party_type_id'];
        $contract_id = rand(111,999);

        $contractRequest->contract_code = $serviceTypeId.'-'.$first_party_title.'-'.$second_party_id.'-'.$second_party_type_id.'-'.$contract_id;

        $exists = ContractRequest::where('contract_code', $contractRequest->contract_code)->first();

        if($exists){
          $contractRequest->contract_code = $serviceTypeId.'-'.$first_party_title.'-'.$second_party_id.'-'.$second_party_type_id.'-'.rand(111,999);
        }

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
