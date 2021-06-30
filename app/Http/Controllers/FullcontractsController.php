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
use App\Filters\pageFilter;
use App\ContractRenew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContractRequest;
use App\Http\Services\ContractService;
use App\Http\Repository\ContractTemplateRepository;
use Carbon\Carbon;

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
      $this->get_privilege();
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
        $contracts = Contract::select('*', 'contracts.id as id', 'contracts.contract_code as code', 'service_types.service_type_title as service_type')
        ->join('service_types', 'service_types.id', '=', 'contracts.service_type_id')
        ->orderBy('contracts.contract_signed_date','desc')->paginate(10);

        return view('fullcontracts.index', compact('contracts'));
    }

    public function allData(Request $request)
    {
        $filters = $this->filters();

        $contracts = Contract::select('*', 'contracts.id as id', 'contracts.contract_code as code', 'contracts.contract_signed_date as sd', 'service_types.service_type_title as service_type')
        ->join('service_types', 'service_types.id', '=', 'contracts.service_type_id')
        ->filter($filters)->orderBy('contracts.id','desc')->with('second_party_type')->get();

        $datatable = \Datatables::of($contracts)
            ->addColumn('index', function (Contract $contract) {
                return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$contract->id.'" class="roles" onclick="collect_selected(this)">';
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
            ->addColumn('country_title', function (Contract $contract) {
                return $contract->country_title;
            })
            ->addColumn('operator_title', function (Contract $contract) {
                return $contract->operator_title;
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

              return view('fullcontracts.actions', compact('contract'))->render();

            })
            ->escapeColumns([])
            ->make(true);
        return $datatable;
    }

    public function contractWillExpire()
    {
      return view('fullcontracts.contract_will_expire');
    }

    public function allContractWillExpire(Request $request)
    {
        $filters = $this->filters();

        $contracts = Contract::select('*', 'contracts.id as id', 'contracts.contract_code as code', 'contracts.contract_signed_date as sd', 'service_types.service_type_title as service_type')
        ->join('service_types', 'service_types.id', '=', 'contracts.service_type_id')
        ->filter($filters)->willexpire()->orderBy('contracts.id','desc')->with('second_party_type')->get();

        $datatable = \Datatables::of($contracts)
            ->addColumn('index', function (Contract $contract) {
                return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$contract->id.'" class="roles" onclick="collect_selected(this)">';
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
            ->addColumn('country_title', function (Contract $contract) {
                return $contract->country_title;
            })
            ->addColumn('operator_title', function (Contract $contract) {
                return $contract->operator_title;
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

              return view('fullcontracts.actions', compact('contract'))->render();

            })
            ->escapeColumns([])
            ->make(true);
        return $datatable;
    }
    public function activeContract()
    {
      return view('fullcontracts.active_contract');
    }

    public function allActiveContract(Request $request)
    {
        $filters = $this->filters();

        $contracts = Contract::select('*', 'contracts.id as id', 'contracts.contract_code as code', 'contracts.contract_signed_date as sd', 'service_types.service_type_title as service_type')
        ->join('service_types', 'service_types.id', '=', 'contracts.service_type_id')
        ->filter($filters)->active()->orderBy('contracts.id','desc')->with('second_party_type')->get();

        $datatable = \Datatables::of($contracts)
            ->addColumn('index', function (Contract $contract) {
                return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$contract->id.'" class="roles" onclick="collect_selected(this)">';
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
            ->addColumn('country_title', function (Contract $contract) {
                return $contract->country_title;
            })
            ->addColumn('operator_title', function (Contract $contract) {
                return $contract->operator_title;
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

              return view('fullcontracts.actions', compact('contract'))->render();

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
        return view('attachments.attachment', compact('Attachments'));
      }
    }
    public function authorization($id)
    {
      $contract = Contract::find($id);
      $Attachments = Attachment::where('contract_id', $contract->id)->where('attachment_type', 2)->get();
      if($Attachments){
        return view('attachments.attachment', compact('Attachments'));
      }
    }
    public function copyright($id)
    {
      $contract = Contract::find($id);
      $Attachments = Attachment::where('contract_id', $contract->id)->where('attachment_type', 3)->get();
      if($Attachments){
        return view('attachments.attachment', compact('Attachments'));
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
      if($contract->ceo_approve === 2 || $contract->ceo_approve === 1){  // 2 = approve  and 1= dis approval   , 0 = no action
        return redirect('fullcontracts/'.$id);
      }else{
        $items = view('fullcontracts.ceo_template', compact('contract','template_items'))->render();
        return view('fullcontracts.ceo_approve',compact('contract','items'));
      }
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
    * @param Request $request
    *
    * @return void
    */
   public function getContractRenewPage($contractId, Request $request)
   {
    if($request->filled('contract_renew_id')) {
      $contract = ContractRenew::findOrFail($request->contract_renew_id);
      $data['start_date'] = Carbon::parse($contract->renew_expire_date->addDays(1)->format('d-m-Y'));
      $data['expire_date'] = Carbon::parse($contract->renew_expire_date->addMonth(get_number_of_month($contract->duration->contract_duration_title))->format('d-m-Y'));
    } else {
      $contract = Contract::findOrFail($contractId);
      $data['start_date'] = Carbon::parse($contract->contract_expiry_date->addDays(1)->format('d-m-Y'));
      $data['expire_date'] = Carbon::parse($contract->contract_expiry_date->addMonth(get_number_of_month($contract->duration->contract_duration_title))->format('d-m-Y'));
    }
     $contract_durations = ContractDuration::all();
     return view('fullcontracts.ceo_contract_renew',compact('contract','contract_durations','data'));
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


   public function export_excel(Request $request)
   {
    $contracts = Contract::select("contract_code","contract_label","first_party","second_party","first_party_percentage","second_party_percentage","contract_signed_date","contract_date","contract_expiry_date","contract_duration.contract_duration_title","country_title","operator_title", "service_types.service_type_title as service_type")
    ->leftjoin('service_types', 'service_types.id', '=', 'contracts.service_type_id')
    ->leftjoin('contract_duration', 'contract_duration.contract_duration_id', '=', 'contracts.contract_duration_id')
    ->orderBy('contracts.contract_signed_date','desc')
    ->get();
    //return $contracts;
       date_default_timezone_set('Africa/Cairo');
       $filename = "excel_contract_".date('Y-m-d H:i:s') . ".csv";
       header('Content-Encoding: UTF-8');
       header("Content-Type: text/csv;charset=utf8mb4");
       header("Content-Disposition: attachment; filename=\"$filename\"");
       header('Content-Transfer-Encoding: binary');
       header("Pragma: no-cache");
       header("Expires: 0");
       echo "\xEF\xBB\xBF"; // UTF-8 BOM
       $out = fopen("php://output", 'w');
       $show_coloumn = false;



       foreach($contracts as $record) {
           if(!$show_coloumn) {
               fputcsv($out, array_keys(@json_decode(json_encode($record), true)), ',', '"');
               $show_coloumn = true;
           }

           fputcsv($out, array_values(@json_decode(json_encode($record), true)), ',', '"');
       }
       mb_convert_encoding($out, 'UTF-16LE', 'UTF-8');
       fclose($out);
       exit;
   }

    // public function contract_list_renews($id,Request $request)
    // {
    //   $contract = Contract::find($id);
    //   return view('contract_renew.index',compact('contract'));
    // }

    public function update_contract_temporary(Request $request)
    {
      $contracts = Contract::orderBy('contracts.contract_signed_date','desc')->get();
      foreach ($contracts as $contract) {
        if ($contract->first_party_select == 0) {
          $contract->first_party = second_partys($contract->second_party_id)->second_party_title;
          $contract->second_party = first_partys($contract->first_party_id)->first_party_title;
        }else{
          $contract->first_party = first_partys($contract->first_party_id)->first_party_title;
          $contract->second_party = second_partys($contract->second_party_id)->second_party_title;
        }
        $contract->save();
      }
      echo "done";
    }

    public function fullcontracts_expiry_date_index(Request $request)
    {
      return view('fullcontracts.index_expiry_date');
    }
    public function fullcontracts_expiry_date(Request $request)
    {
        $filters = $this->filters();

        $contracts = Contract::select('*', 'contracts.id as id', 'contracts.contract_code as code', 'contracts.contract_signed_date as sd', 'service_types.service_type_title as service_type')
        ->join('service_types', 'service_types.id', '=', 'contracts.service_type_id')
        ->where('contracts.contract_expiry_date','<',Carbon::now()->format('Y-m-d'))
        ->filter($filters)->orderBy('contracts.contract_signed_date','desc')->with('second_party_type')->get();

        $datatable = \Datatables::of($contracts)
            ->addColumn('index', function (Contract $contract) {
                return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$contract->id.'" class="roles" onclick="collect_selected(this)">';
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
            ->addColumn('country_title', function (Contract $contract) {
                return $contract->country_title;
            })
            ->addColumn('operator_title', function (Contract $contract) {
                return $contract->operator_title;
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

              return view('fullcontracts.actions', compact('contract'))->render();

            })
            ->escapeColumns([])
            ->make(true);
        return $datatable;
    }

  public function getStatistics()
  {
    $expire_contracts_statistics = [];
    $active_contracts_statistics = [];
    $next_contracts_statistics = [];
    $statistic_years = statisticsYears();

    foreach ($statistic_years as $year) {
      $last_year = $year - 1;
      $next_year = $year + 1;
      $last_year_date = date('Y-m-d', strtotime('01/01/' . $last_year));
      $current_year_date = date('Y-m-d', strtotime('01/01/' . $year));
      $next_year_date = date('Y-m-d', strtotime('01/01/' . $next_year));
      $expire_contracts = 0;
      $active_contracts = 0;
      $next_contracts = 0;

      if ($year < date('Y')) {
        $expire_contracts = Contract::activeYear($last_year_date, $current_year_date)->count();
      }

      if ($year == date('Y')) {
        //expire
        $expire_start_date = date('Y-m-d', strtotime('01/01/' . $year));
        $expire_end_date = date('Y-m-d');
        $expire_contracts = Contract::activeYear($expire_start_date, $expire_end_date)->count();

        //next
        $next_start_date = date('Y-m-d');
        $next_end_date = date('Y-m-d', strtotime($next_start_date . "+3 months"));
        $next_contracts = Contract::activeYear($next_start_date, $next_end_date)->count();

        $active_contracts = Contract::active()->count();
      }

      if ($year > date('Y')) {
        $next_contracts = Contract::activeYear($current_year_date, $next_year_date)->count();
      }

      array_push($expire_contracts_statistics, ['label' => $year, 'y' => $expire_contracts, 'link' => 'http://google.com/']);
      array_push($active_contracts_statistics, ['label' => $year, 'y' => $active_contracts, 'link' => 'http://google.com/']);
      array_push($next_contracts_statistics, ['label' => $year, 'y' => $next_contracts, 'link' => 'http://google.com/']);
    }

    return view('fullcontracts.statistics', compact('expire_contracts_statistics', 'active_contracts_statistics', 'next_contracts_statistics'));
  }

}
