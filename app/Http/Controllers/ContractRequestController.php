<?php

namespace App\Http\Controllers;

use App\Country;
use App\Operator;
use App\Department;
use App\Percentage;
use App\Firstpartie;
use App\SecondParty;
use App\ServiceTypes;
use App\ContractRequest;
use App\ContractDuration;
use App\Http\Controllers\Controller;
use App\Http\Repository\ContractRepository;
use App\Http\Requests\ContractRequestRequest;
use App\Http\Services\ContractRequestService;
use App\Http\Repository\ContractRequestRepository;
use App\Http\Repository\ContractTemplateRepository;

class ContractRequestController extends Controller
{
    /**
     * ContractRequestRepository
     *
     * @var ContractRequestRepository
     */
    private $contractRequestRepository;
    /**
     * ContractRepository
     *
     * @var ContractRepository
     */
    private $contractRepository;
    /**
     * ContractTemplateRepository
     *
     * @var ContractTemplateRepository
     */
    private $ContractTemplateRepository;
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
    public function __construct(
      ContractRequestRepository $contractRequestRepository,
      ContractRequestService $contractRequestService,
      ContractTemplateRepository $ContractTemplateRepository
     )
    {
        $this->get_privilege();
        $this->contractRequestRepository = $contractRequestRepository;
        $this->ContractTemplateRepository = $ContractTemplateRepository;
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
            return view('contract_request.actions', compact('contract_request'));
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
        $contractRequest = $this->contractRequestService->handle($request->validated());

        $request->session()->flash('success', 'ContractRequest created successfull');

        return redirect("contractrequests/$contractRequest->id");
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
        $contractRequest = $this->contractRequestService->handle($request->validated(), $id);

        $request->session()->flash('success', 'updated successfully');

        return redirect("contractrequests/$contractRequest->id");
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


    /**
     * create contract from contract request.
     *
     * @param    int $id
     * @return  View
     */
    public function contractCreate($id)
    {
      $first_parties = Firstpartie::all();
      $percentages = Percentage::all();
      $service_types = ServiceTypes::all();
      $second_partys = SecondParty::all();
      $countries = Country::all();
      $operators = Operator::all();
      $contract_durations = ContractDuration::all();
      $templates = $this->ContractTemplateRepository->all();
      $departments = Department::all();

        $contractRequest = $this->contractRequestRepository->findOrfail($id);

        return view('contract_request.contractCreate', compact('contractRequest', 'first_parties', 'percentages', 'service_types', 'second_partys', 'countries', 'operators', 'contract_durations', 'templates','departments'));
    }

    /**
     * list contract from contract request.
     *
     * @param    int $id
     * @return  View
     */
    public function contractRequestsListContract($id)
    {
        $contract = $this->contractRequestRepository->findOrfail($id)->contracts;
        return view('fullcontracts.view', compact('contract'));
    }
}
