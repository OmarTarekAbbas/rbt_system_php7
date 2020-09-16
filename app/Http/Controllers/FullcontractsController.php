<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Contract;
use App\Firstparties;
use App\Percentage;
use App\ServiceTypes;
use App\SecondParty;
use App\Country;
use App\Operator;
use App\ContractDuration;
use Datatables;




class FullcontractsController extends Controller
{

    public function index()
    {
        $contracts = Contract::all();
        return view('fullcontracts.index', compact("contracts"));
    }

    public function allData(Request $request)
    {
        $contracts = Contract::select('*', 'contracts.id as id', 'contracts.contract_code as code', 'service_types.service_type_title as service_type')
            ->join('service_types', 'service_types.id', '=', 'contracts.service_type_id')
            ->get();
        $datatable = \Datatables::of($contracts)
            ->addColumn('index', function (Contract $contract) {
                return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$contract->id}}" class="roles" onclick="collect_selected(this)">';
            })
            ->addColumn('id', function (Contract $contract) {
                return $contract->id;
            })
            ->addColumn('code', function (Contract $contract) {
                return $contract->code;
            })
            ->addColumn('service_type', function (Contract $contract) {
                return $contract->service_type;
            })
            ->addColumn('contract_label', function (Contract $contract) {
                return $contract->contract_label;
            })
            ->addColumn('contract_date', function (Contract $contract) {
                return  date('F j, Y', strtotime($contract->contract_date));
            })
            ->addColumn('contract_status', function (Contract $contract) {
                return $contract->contract_status ? 'Active' : 'Not Active';
            })
            ->addColumn('contract_expiry_date', function (Contract $contract) {
                return  date('F j, Y', strtotime($contract->contract_expiry_date));
            })
            ->addColumn('action', function (Contract $contract) {

                return '<td class="visible-md visible-lg">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-secondary show-tooltip " title="" href="' . url("contractservice/create/" . $contract->id) . '" data-original-title="Show"><i class="fa fa-arrow-right"></i></a>
                                <a class="btn btn-sm btn-primary show-tooltip " title="" href="' . url("fullcontracts/" . $contract->id) . '" data-original-title="Show"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm show-tooltip" href="' . url("fullcontracts/" . $contract->id . "/edit") . '" title="Edit"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="' . url("fullcontracts/" . $contract->id . "/delete") . '" title="Delete"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>';
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
        $first_parties = Firstparties::all();
        $percentages = Percentage::all();
        $service_types = ServiceTypes::all();
        $second_partys = SecondParty::all();
        $countries = Country::all();
        $operators = Operator::all();
        $contract_durations = ContractDuration::all();
        return view('fullcontracts.create', compact('first_parties', 'percentages', 'service_types', 'second_partys', 'countries', 'operators', 'contract_durations'));
    }

    public function store(Request $request)
    {
        $arr_operator = $request->operator_title;
        $arr_country = $request->country_title;
        $contract = new Contract();
        $contract->contract_code = 'C#' . date('Y') . "/" . date('m') . "/" . date('d') . "/" . time();
        $contract->contract_label = $request->contract_label;
        $contract->first_party_id = $request->first_party_id;
        $contract->first_party_select = $request->first_party_select;
        $contract->first_party_percentage = $request->first_party_percentage;
        $contract->copies = $request->copies;
        $contract->pages = $request->pages;
        $contract->service_type_id = $request->service_type_id;
        $contract->second_party_type_id = $request->second_party_type_id;
        $contract->second_party_id = $request->second_party_id;
        $contract->contract_date = $request->contract_date;
        $contract->contract_duration_id = $request->contract_duration_id;
        $contract->renewal_status = $request->renewal_status;
        $contract->contract_status = $request->contract_status;
        $contract->contract_expiry_date = $request->contract_expiry_date;
        $contract->contract_notes = $request->contract_notes;
        $contract->operator_title = implode(",", $arr_operator);
        $contract->country_title = implode(",", $arr_country);
        $contract->entry_by_details = \Auth::user()->name;
        if ($request->hasFile('contract_pdf')) {
            if ($request->file('contract_pdf')->isValid()) {
                try {
                    $pdfName = time() . '.' . $request->contract_pdf->getClientOriginalExtension();

                    $request->contract_pdf->move('uploads/pdf', $pdfName);

                    $contract->contract_pdf = $pdfName;
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                }
            }
        }

        $contract->save();
        $request->session()->flash('success', 'Add Contract Successfully');
        return redirect('fullcontracts');
    }

    public function edit($id)
    {
        $contract = Contract::findOrfail($id);
        $first_parties = Firstparties::all();
        $percentages = Percentage::all();
        $service_types = ServiceTypes::all();
        $second_partys = SecondParty::all();
        $countries = Country::all();
        $operators = Operator::all();
        $contract_durations = ContractDuration::all();
        return view('fullcontracts.edit', compact('contract', 'first_parties', 'percentages', 'service_types', 'second_partys', 'countries', 'operators', 'contract_durations'));
    }

    public function update($id, Request $request)
    {
        $contract = Contract::findOrFail($id);
        $arr_operator = $request->operator_title;
        $arr_country = $request->country_title;
        $contract->contract_code = 'C#' . date('Y') . "/" . date('m') . "/" . date('d') . "/" . time();
        $contract->contract_label = $request->contract_label;
        $contract->first_party_id = $request->first_party_id;
        $contract->first_party_select = $request->first_party_select;
        $contract->first_party_percentage = $request->first_party_percentage;
        $contract->copies = $request->copies;
        $contract->pages = $request->pages;
        $contract->service_type_id = $request->service_type_id;
        $contract->second_party_type_id = $request->second_party_type_id;
        $contract->second_party_id = $request->second_party_id;
        $contract->contract_date = $request->contract_date;
        $contract->contract_duration_id = $request->contract_duration_id;
        $contract->renewal_status = $request->renewal_status;
        $contract->contract_status = $request->contract_status;
        $contract->contract_expiry_date = $request->contract_expiry_date;
        $contract->contract_notes = $request->contract_notes;
        $contract->operator_title = implode(",", $arr_operator);
        $contract->country_title = implode(",", $arr_country);
        $contract->entry_by_details = \Auth::user()->name;
        if ($request->hasFile('contract_pdf')) {
            if ($request->file('contract_pdf')->isValid()) {
                try {
                    $pdfName = time() . '.' . $request->contract_pdf->getClientOriginalExtension();

                    $request->contract_pdf->move('uploads/pdf', $pdfName);

                    $contract->contract_pdf = $pdfName;
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                }
            }
        }
        $contract->save();
        $request->session()->flash('success', 'Update Contract Successfully');
        return redirect('fullcontracts');
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
        //dd($second_parties);
        $clintresult = '<option value="">-- Please Select --</option>';
        foreach ($second_parties as $second_partie) {
            $clintresult .= '<option value="' . $second_partie->second_party_id . '">' . $second_partie->second_party_title . '</option>';
        }
        echo $clintresult;
    }

}
