<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Http\Repository\ContractRequestRepository;
use App\ContractRequest;
class ClientContractRequestController extends Controller
{
   /**
     * ContractRequestRepository
     *
     * @var ContractRequestRepository
     */
    private $contractRequestRepository;
    /**
     * __construct
     *
     * @param  ContractRequestRepository $contractRequestRepository
     */
    public function __construct(ContractRequestRepository $contractRequestRepository)
    {
        $this->contractRequestRepository = $contractRequestRepository;
    }

    /**
     * index
     * get all ContractRequest data
     * @return View
     */
    public function index()
    {
        $contractRequests = $this->contractRequestRepository->get();
        return view('client.contract_request.index',compact('contractRequests'));
    }

        /**
     * Method allData
     *
     * return client payments data as server side
     *
     * @return void
     */
    public function allData()
    {
      $contract_requests = $this->contractRequestRepository
                          ->where('second_party_id',session()->get('client')->second_party_id)
                          ->latest()->get();

      $datatable = \Datatables::of($contract_requests)
        ->addColumn('index', function (ContractRequest $contract_request) {
          return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$contract_request->id.'" class="roles" onclick="collect_selected(this)">';
        })
        ->addColumn('id', function (ContractRequest $contract_request) {
          return $contract_request->id;
        })
        ->addColumn('title', function (ContractRequest $contract_request) {
          return $contract_request->title;
        })
        ->addColumn('first_party_id', function (ContractRequest $contract_request) {
          return $contract_request->firstparty->first_party_title;
        })
        ->addColumn('second_party_id', function (ContractRequest $contract_request) {
          return $contract_request->secondparty->second_party_title;
        })
        ->addColumn('second_party_type_id', function (ContractRequest $contract_request) {
          return $contract_request->secondpartytype->second_party_type_title;
        })
        ->addColumn('service_type_id', function (ContractRequest $contract_request) {
          return $contract_request->servicetype->service_type_title;
        })
        ->addColumn('action', function (ContractRequest $contract_request) {
            return view('client.contract_request.actions', compact('contract_request'));
        })
        ->escapeColumns([])
        ->make(true);

      return $datatable;
    }

   /**
     * Show the specified resource.
     * @param    int  $id
     * @return  View
     */
    public function show($id)
    {
        $contractRequest = $this->contractRequestRepository->whereId($id)->where('second_party_id',session()->get('client')->second_party_id)->firstOrfail();
        return view('client.contract_request.show',compact('contractRequest'));
    }
}
