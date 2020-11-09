<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\ContractService;
use App\Contract;






class ServicecontractsController extends Controller
{
  public function __construct()
  {
    $this->get_privilege();
  }

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

    public function create($id = null)
    {
        if($id){
          $contract_show = Contract::find($id);
          return view('servicecontracts.create',compact('contract_show'));
        }

        $contracts = Contract::all();
        return view('servicecontracts.create',compact('contracts'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'title',
        ]);

        $service['contract_id'] = $request->contract_id;

        foreach($request->title as $id => $title){
            $old_service['id'] = $id;
            $service['title'] = $title;
            $contract = ContractService::updateOrCreate($old_service, $service);
        }
        $request->session()->flash('success', 'Add Contract Service Successfully');
        return back();
    }

    public function edit($id)
    {
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
