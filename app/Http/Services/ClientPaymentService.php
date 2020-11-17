<?php


namespace App\Http\Services;

use App\Http\Repository\ClientPaymentRepository;

class ClientPaymentService
{
    /**
     * @var ClientPaymentRepository
     */
    private $clientPaymentRepository;

    /**
     * __construct
     *
     * @param  ClientPaymentRepository $clientPaymentRepository
     */
    public function __construct(ClientPaymentRepository $clientPaymentRepository)
    {
        $this->clientPaymentRepository  = $clientPaymentRepository;
    }
    /**
     * handle function that make update for clientPayment
     * @param array $request
     * @return ClientPayment
     */
    public function handle($request, $clientPaymentId = null)
    {
        $clientPayment = $this->clientPaymentRepository;

        if($clientPaymentId) {
            $clientPayment = $this->clientPaymentRepository->find($clientPaymentId);
        }
        if($request['month'][0]== "all"){
          $months_array = [];
          for($month = 1 ; $month <= 12 ; $month++){
            $months_array []= date("F", strtotime("$month/1/1"));
          }
          $request = array_merge($request,[
            'month' => implode(',', $months_array)
          ]);
        }else{
            $request = array_merge($request,[
              'month' => implode(',', $request['month'])
            ]);
        }


        $clientPayment->fill($request);

        $clientPayment->save();

    	return $clientPayment;
    }

}
