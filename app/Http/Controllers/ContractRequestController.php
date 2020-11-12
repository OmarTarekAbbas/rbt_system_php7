<?php

namespace App\Http\Controllers;

use App\ContractRequest;
use App\Country;
use App\Firstpartie;
use App\Http\Controllers\Controller;
use App\Http\Repository\ContractRequestRepository;
use App\Http\Requests\ContractRequestRequest;
use App\Http\Services\ContractRequestService;
use App\Operator;
use App\SecondParty;
use App\ServiceTypes;

class ContractRequestController extends Controller
{
    /**
     * ContractRequestRepository
     *
     * @var ContractRequestRepository
     */
    private $contractRequestRepository;
    /**
     * ContractRequestService
     *
     * @var ContractRequestService
     */
    private $contractRequestService;
    /**
     * __construct
     *
     * @param  ContractRequestRepository $contractRequestRepository
     * @param  ContractRequestService $contractRequestService
     */
    public function __construct(ContractRequestRepository $contractRequestRepository, ContractRequestService $contractRequestService)
    {
        $this->get_privilege();
        $this->contractRequestRepository = $contractRequestRepository;
        $this->contractRequestService = $contractRequestService;
    }

    /**
     * index
     * get all ContractRequest data
     * @return View
     */
    public function index()
    {
        $contractRequests = $this->contractRequestRepository->get();
        return view('contract_request.index',compact('contractRequests'));
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
      $contract_requests = $this->contractRequestRepository->latest()->get();

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
        ->addColumn('action', function (ContractRequest $contract_request) {
            return view('contract_request.actions', compact('contract_request'));;
        })
        ->escapeColumns([])
        ->make(true);

      return $datatable;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  View
     */
    public function create()
    {
        $first_parties = Firstpartie::all();
        $service_types = ServiceTypes::all();
        $second_party_types = SecondParty::all();
        $countries = Country::all();
        $operators = Operator::all();
        return view('contract_request.create',compact('countries','operators','second_party_types','service_types','first_parties'));
    }

    /**
     * store ContractRequest data
     *
     * @param  ContractRequestRequest $request
     * @return Redirect
     */
    public function store(ContractRequestRequest $request)
    {
        $this->contractRequestService->handle($request->validated());

        $request->session()->flash('success', 'ContractRequest created successfull');

        return redirect('contractrequests');
    }

    /**
     * Show the specified resource.
     * @param    int  $id
     * @return  View
     */
    public function show($id)
    {
        $contractRequest = $this->contractRequestRepository->findOrfail($id);
        return view('contract_request.show',compact('contractRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    int  $id
     * @return  View
     */
    public function edit($id)
    {
        $contractRequest = $this->contractRequestRepository->findOrfail($id);
        $first_parties = Firstpartie::all();
        $service_types = ServiceTypes::all();
        $second_party_types = SecondParty::all();
        $countries = Country::all();
        $operators = Operator::all();
        return view('contract_request.edit',compact('contractRequest','countries','operators','second_party_types','service_types','first_parties'));
    }

    /**
     * update
     *
     * @param  int $id
     * @param  ContractRequestUpdateRequest $request
     * @return Redirect
     */
    public function update($id, ContractRequestRequest $request)
    {
        $this->contractRequestService->handle($request->validated(), $id);

        $request->session()->flash('success', 'updated successfully');

        return redirect('contractrequests');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ContractRequest = $this->contractRequestRepository->findOrfail($id);

        $ContractRequest->delete();

        \Session::flash('success', 'deleted successfully');

        return back();
    }
}
