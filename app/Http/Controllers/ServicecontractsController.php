<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\ContractService;
use App\Contract;






class ServicecontractsController extends Controller
{

    public function index()
    {
        $contractServices = ContractService::select('*', 'contract_services.id as id','contracts.contract_code as contract_code')
        ->join('contracts', 'contracts.id', '=', 'contract_services.contract_id')
        ->get();

        return view('servicecontracts.index',compact('contractServices'));
    }


    public function show($id)
    {
    }

    public function create()
    {
        $contracts = Contract::all();
        return view('servicecontracts.create',compact('contracts'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'title',
        ]);
        $contract = new ContractService();
        $contract->contract_id = $request->contract_id;
        $contract->title = $request->title;
        $contract->save();
        $request->session()->flash('success', 'Add Contract Service Successfully');
        return redirect('contractservice');
    }

    public function edit($id)
    {
        $contractServices = ContractService::select('*', 'contract_services.id as id','contracts.contract_code as contract_code')
        ->join('contracts', 'contracts.id', '=', 'contract_services.contract_id')
        ->get();
        return view('servicecontracts.edit',compact('contractServices'));
    }

    public function update($id, Request $request)
    {
    }

    public function destroy($id, Request $request)
    {
        $contract = ContractService::findOrfail($id);
        $contract->delete();
        $request->session()->flash('success', 'Deleted successfuly');
        return redirect('contractservice');
    }
}
