<?php

namespace App\Http\Controllers;
use App\Contract;
use App\Filters\DateFilter;
use App\Filters\pageFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Services\ContractService;
use App\Http\Repository\ContractTemplateRepository;

class ClientContractController extends Controller
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

    public function __construct(ContractTemplateRepository $ContractTemplateRepository, ContractService $ContractService) {
        $this->ContractTemplateRepository = $ContractTemplateRepository;
        $this->ContractService    = $ContractService;
    }

    public function filters()
    {
        $filters = [
          'date' => new DateFilter,
          'page' => new pageFilter,
        ];

        return $filters;
    }

    public function index()
    {
        return view('client.contract.index');
    }

    public function allData()
    {

        $filters = $this->filters();

        $contracts = Contract::select('*', 'contracts.id as id', 'contracts.contract_code as code', 'contracts.contract_signed_date as sd', 'service_types.service_type_title as service_type')
        ->join('service_types', 'service_types.id', '=', 'contracts.service_type_id')
        ->where('second_party_id',session()->get('client')->second_party_id)
        ->filter($filters)
        ->orderBy('sd','desc')
        ->with('second_party_type')
        ->get();

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
            ->addColumn('first_party', function (Contract $contract) {
                if($contract->first_party_select){
                  return $contract->first_parties->first_party_title;
                }
                return $contract->second_parties->second_party_title;
            })
            ->addColumn('second_party', function (Contract $contract) {
                if($contract->first_party_select){
                  return $contract->second_parties->second_party_title;
                }
                return $contract->first_parties->first_party_title;
            })
            ->addColumn('second_party_type_id', function (Contract $contract) {
                return $contract->second_party_type->second_party_type_title;
            })
            ->addColumn('contract_date', function (Contract $contract) {
                return  date('F j, Y', strtotime($contract->contract_date));
            })
            ->addColumn('contract_signed_date', function (Contract $contract) {
              return date('F j, Y', strtotime($contract->contract_signed_date));
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

              return view('client.contract.actions', compact('contract'))->render();

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
        return view('client.contract.view', compact('contract', 'first_partie', 'second_parties', 'second_party_types'));
    }
}
