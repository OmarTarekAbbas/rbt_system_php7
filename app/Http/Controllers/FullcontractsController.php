<?php

namespace App\Http\Controllers;

use Datatables;
use App\Country;
use App\Contract;

use App\Operator;
use App\Attachment;
use App\Department;
use App\Percentage;
use App\Firstpartie;
use App\SecondParty;
use App\ServiceTypes;
use App\ContractDuration;
use App\Filters\DateFilter;
use App\ContractRenew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContractRequest;
use App\Http\Services\ContractService;
use App\Http\Repository\ContractTemplateRepository;

class FullcontractsController extends Controller
{

    /**
     * ContractTemplateRepository
     *
     * @var ContractTemplateRepository
     */
    private $ContractTemplateRepository;
    /**
     * ContractService
     *
     * @var ContractService
     */
    private $ContractService;

    public function __construct(
      ContractTemplateRepository $ContractTemplateRepository,
      ContractService $ContractService
    ) {
        $this->middleware(['auth', 'role:super_admin|legal|ceo'], ['except' => ['index', 'allData', 'annex', 'authorization', 'copyright', 'downloadContractItems', 'show']]);
        $this->ContractTemplateRepository = $ContractTemplateRepository;
        $this->ContractService    = $ContractService;
    }

    public function filters()
    {
        $filters = [
          'date' => new DateFilter,
        ];

        return $filters;
    }

    public function index()
    {
        return view('fullcontracts.index');
    }

    public function allData(Request $request)
    {
        $filters = $this->filters();

        $contracts = Contract::select('*', 'contracts.id as id', 'contracts.contract_code as code', 'service_types.service_type_title as service_type')
        ->join('service_types', 'service_types.id', '=', 'contracts.service_type_id')
        ->orderBy('contracts.id','desc')->filter($filters)->get();

        $datatable = \Datatables::of($contracts)
            ->addColumn('index', function (Contract $contract) {
                return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$contract->id}}" class="roles" onclick="collect_selected(this)">';
            })
            ->addColumn('id', function (Contract $contract) {
                return $contract->id;
            })
            ->addColumn('code', function (Contract $contract) {
                return '<a target="_blank" href="'.url("Contract/".$contract->id."/items/download").'">' .$contract->code. '</a>';
            })
            ->addColumn('service_type', function (Contract $contract) {
                return $contract->service_type;
            })
            ->addColumn('contract_label', function (Contract $contract) {
                return $contract->contract_label;
            })
            ->addColumn('contract_status', function (Contract $contract) {
              return $contract->contract_status ? 'Active' : 'Not Active';
            })
            ->addColumn('contract_date', function (Contract $contract) {
                return  date('F j, Y', strtotime($contract->contract_date));
            })
            ->addColumn('contract_signed_date', function (Contract $contract) {
              return $contract->contract_signed_date;
            })
            ->addColumn('contract_expiry_date', function (Contract $contract) {
                return  date('F j, Y', strtotime($contract->contract_expiry_date));
            })
            ->addColumn('action1', function (Contract $contract) {
                $authorization = '';
                $annex = '';
                $copyright = '';
                if($contract->authorization) {
                  $authorization = '<a class="btn btn-sm btn-warning show-tooltip" href="' . url("contract/al/" . $contract->id) . '" title="authorization">AL</a>';
                }
                if($contract->annex) {
                  $annex = '<a class="btn btn-sm btn-info show-tooltip" href="' . url("contract/an/" . $contract->id) . '" title="annex">AN</a>';
                }
                if($contract->copyright) {
                  $copyright = '<a class="btn btn-sm btn-primary show-tooltip" href="' . url("contract/cr/" . $contract->id) . '" title="copyright">CR</a>';
                }
                return '<td class="visible-md visible-lg">
                            <div class="btn-group">
                                '.$authorization.'
                                '.$annex.'
                                '.$copyright.'
                            </div>
                        </td>';
            })
            ->addColumn('action', function (Contract $contract) {

                if(Auth::user()->hasRole(['operation'])){
                  return '<td class="visible-md visible-lg">
                  <div class="btn-group">
                      <a target="_blank" class="btn btn-sm show-tooltip btn-success" title="Show PDF" href="'.url("Contract/".$contract->id."/items/download").'" data-original-title="Show"><i class="fa fa-file"></i></a>
                      <a class="btn btn-sm btn-primary show-tooltip " href="' . url("fullcontracts/" . $contract->id) . '" title="Show"><i class="fa fa-eye"></i></a>
                  </div>
                  </td>';
                }else{
                  return '<td class="visible-md visible-lg">
                  <div class="btn-group">
                      <a class="btn btn-sm btn-secondary show-tooltip " href="' . url("contractservice/create/" . $contract->id) . '" title="View Services"><i class="fa fa-arrow-right"></i></a>
                      <a target="_blank" class="btn btn-sm show-tooltip btn-success" title="Show PDF" href="'.url("Contract/".$contract->id."/items/download").'" data-original-title="Show"><i class="fa fa-file"></i></a>
                      <a class="btn btn-sm btn-primary show-tooltip " href="' . url("fullcontracts/" . $contract->id) . '" title="Show"><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm show-tooltip" href="' . url("fullcontracts/" . $contract->id . "/edit") . '" title="Edit"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="' . url("fullcontracts/" . $contract->id . "/delete") . '" title="Delete"><i class="fa fa-trash"></i></a>
                  </div>
                  </td>';
                }
            })

            ->escapeColumns([])
            ->make(true);
        return $datatable;
    }

    public function show($id)
    {
        $contract = Contract::find($id);
        $first_partie = DB::table('first_parties')->where('id', $contract->first_party_id)->first();
        $second_parties = DB::table('second_parties')->where('second_party_id', $contract->second_party_id)->first();
        $second_party_types = DB::table('second_party_types')->where('id', $contract->second_party_type_id)->first();
        return view('fullcontracts.view', compact('contract', 'first_partie', 'second_parties', 'second_party_types'));
    }

    public function create()
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
        return view('fullcontracts.create', compact('first_parties', 'percentages', 'service_types', 'second_partys', 'countries', 'operators', 'contract_durations', 'templates','departments'));
    }

    public function store(ContractRequest $request)
    {
        $contract = $this->ContractService->handle($request->validated());
        session()->flash('success', 'Add Contract Successfully');
        return redirect('fullcontracts/'.$contract->id);
    }

    public function edit($id)
    {
        $contract = Contract::findOrfail($id);
        $first_parties = Firstpartie::all();
        $percentages = Percentage::all();
        $service_types = ServiceTypes::all();
        $second_partys = SecondParty::all();
        $countries = Country::all();
        $operators = Operator::all();
        $contract_durations = ContractDuration::all();
        return view('fullcontracts.edit', compact('contract', 'first_parties', 'percentages', 'service_types', 'second_partys', 'countries', 'operators', 'contract_durations'));
    }

    public function update($id, ContractRequest $request)
    {
        $contract = $this->ContractService->handle($request->validated(), $id);
        session()->flash('success', 'Add Contract Successfully');
        return redirect('fullcontracts/'.$contract->id);
    }

    public function destroy($id, Request $request)
    {
        $contract = Contract::findOrfail($id);
        $contract->delete();
        $request->session()->flash('success', 'Deleted successfuly');
        return redirect('fullcontracts');
    }

    public function getClient(Request $request)
    {
        $second_parties = DB::table('second_parties')->where('second_party_type_id', $request['body'])->get();
        $clintresult = '<option value="">-- Please Select --</option>';
        foreach ($second_parties as $second_partie) {
          $selected = '';
          if($request->has('second_party_id') && $request->second_party_id == $second_partie->second_party_id){
            $selected = 'selected';
          }
            $clintresult .= '<option '.$selected.' value="' . $second_partie->second_party_id . '">' . $second_partie->second_party_title . '</option>';
        }
        echo $clintresult;
    }

    public function annex($id)
    {
      $contract = Contract::find($id);
      $Attachments = Attachment::where('contract_id', $contract->id)->where('attachment_type', 1)->get();
      if($Attachments){
        return view('attachments.index', compact('Attachments'));
      }
    }
    public function authorization($id)
    {
      $contract = Contract::find($id);
      $Attachments = Attachment::where('contract_id', $contract->id)->where('attachment_type', 2)->get();
      if($Attachments){
        return view('attachments.index', compact('Attachments'));
      }
    }
    public function copyright($id)
    {
      $contract = Contract::find($id);
      $Attachments = Attachment::where('contract_id', $contract->id)->where('attachment_type', 3)->get();
      if($Attachments){
        return view('attachments.index', compact('Attachments'));
      }
    }

    /**
     * Method template_items
     *
     * @param int $id
     *
     * @return void
     */
    public function template_items($id)
    {
      $template_items = $this->ContractTemplateRepository->find($id)->items;
      $departments = Department::all();

      $view = view('fullcontracts.template', compact('template_items','departments'))->render();

      return $view;
    }

    /**
     * Method downloadContractItems
     *
     * @param int $id
     *
     * @return void
     */
    public function downloadContractItems($id) {
      $row = Contract::find($id);
      return redirect('uploads/contracts/'.$row->contract_pdf);
   }

   /**
    * Method getCeoApprovePage
    *
    * @param int $id
    *
    * @return void
    */
   public function getCeoApprovePage($id)
   {
     $contract = Contract::findOrfail($id);
     $template_items = $contract->items;
     $items = view('fullcontracts.ceo_template', compact('contract','template_items'))->render();
     return view('fullcontracts.ceo_approve',compact('contract','items'));
   }

   /**
    * Method saveCeoApprove
    *
    * @param int $id
    * @param Request $request
    *
    * @return void
    */
   public function saveCeoApprove($id,Request $request)
   {
     $contract = Contract::find($id);
     $contract->ceo_approve = $request->ceo_approve;
     $contract->save();
     session()->flash("success",'Your Action For This Contract Saved');
     return redirect('fullcontracts/'.$id);
   }

   /**
    * Method getContractRenewPage
    *
    * @param int $contractId
    *
    * @return void
    */
   public function getContractRenewPage($contractId)
   {
     $contract = Contract::findOrFail($contractId);
     return view('fullcontracts.ceo_contract_renew',compact('contract'));
   }

   /**
    * Method saveContractRenew
    * get last contract that wanted to renew from table
    * @param int $id
    * @param Request $request
    *
    * @return void
    */
   public function saveContractRenew($id,Request $request)
   {
    if($request->filled('contract_renew_id')) {
      $contract = ContractRenew::findOrFail($request->contract_renew_id);
      $contract->ceo_renew = $request->ceo_renew;
      $contract->save();
    } else {
      $contract = Contract::findOrFail($id);
      $contract->ceo_renew = $request->ceo_renew;
      $contract->save();
    }
    return redirect('fullcontracts/'.$id);
   }
}
