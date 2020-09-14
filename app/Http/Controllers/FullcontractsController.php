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




class FullcontractsController extends Controller
{
    public function index()
    {
        $contracts = Contract::all();
        //dd($contract);
        return view('fullcontracts.index', compact("contracts"));
    }

    public function show($id)
    {
        $contract = Contract::find($id);
        //dd($contract);
        return view('fullcontracts.view', compact('contract'));
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
        //dd($percentages);
        return view('fullcontracts.create', compact('first_parties', 'percentages', 'service_types', 'second_partys', 'countries', 'operators', 'contract_durations'));
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
        return view('fullcontracts.edit', compact('contract','first_parties', 'percentages', 'service_types', 'second_partys', 'countries', 'operators', 'contract_durations'));

    }


    public function update(Request $request, $id)
    {
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
