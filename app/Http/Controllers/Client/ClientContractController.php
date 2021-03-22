<?php

namespace App\Http\Controllers\Client;
use App\Contract;
use App\Filters\DateFilter;
use App\Filters\pageFilter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ClientContractController extends Controller
{
    /**
     * Method filters
     *
     * @return Array
     */
    public function filters()
    {
        $filters = [
          'date' => new DateFilter,
          'page' => new pageFilter,
        ];

        return $filters;
    }

    /**
     * Method index
     *
     * @return View
     */
    public function index()
    {
        return view('client.contracts.index');
    }

    /**
     * Method allData
     *
     * @return Datatables
     */
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

                return '<a target="_blank" href="'.url("uploads/contracts/".$contract->contract_pdf).'">' .$contract->code. '</a>';
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
                  $authorization = '<a class="btn btn-sm btn-warning show-tooltip" href="' . url("client/contract/al/$contract->id") . '" title="authorization">AL</a>';
                }
                if($contract->annex) {
                  $annex = '<a class="btn btn-sm btn-info show-tooltip" href="' . url("client/contract/an/$contract->id") . '" title="annex">AN</a>';
                }
                if($contract->copyright) {
                  $copyright = '<a class="btn btn-sm btn-primary show-tooltip" href="' . url("client/contract/cr/$contract->id") . '" title="copyright">CR</a>';
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

              return view('client.contracts.actions', compact('contract'))->render();

            })
            ->escapeColumns([])
            ->make(true);
        return $datatable;
    }

    /**
     * Method show
     *
     * @param integer $id
     *
     * @return view
     */
    public function show($id)
    {
      $contract = Contract::whereId($id)->where('second_party_id',session()->get('client')->second_party_id)->firstOrfail();
        $first_partie = DB::table('first_parties')->where('id', $contract->first_party_id)->first();
        $second_parties = DB::table('second_parties')->where('second_party_id', $contract->second_party_id)->first();
        $second_party_types = DB::table('second_party_types')->where('id', $contract->second_party_type_id)->first();
        return view('client.contracts.view', compact('contract', 'first_partie', 'second_parties', 'second_party_types'));
    }

    /**
     * Method annex
     *
     * @param Contract $contract
     *
     * @return view
     */
    public function annex(Contract $contract)
    {
      $Attachment = $contract->annex;
      return view('client.contracts.attachment.index', compact('Attachment'));

    }
    /**
     * Method authorization
     *
     * @param Contract $contract
     *
     * @return view
     */
    public function authorization(Contract $contract)
    {
      $Attachment = $contract->authorization;
      return view('client.contracts.attachment.index', compact('Attachment'));
    }
    /**
     * Method copyright
     *
     * @param Contract $contract
     *
     * @return view
     */
    public function copyright(Contract $contract)
    {
      $Attachment = $contract->copyright;
      return view('client.contracts.attachment.index', compact('Attachment'));
    }
}
