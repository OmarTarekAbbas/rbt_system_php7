<?php

namespace App\Http\Controllers;

use App\Party;
use Validator;
use App\Revenue;
use App\Contract;
use App\Currency;
use App\Operator;
use App\ServiceTypes;
use App\ContractService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revenues = Revenue::all();

        return view('revenue.index', compact('revenues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contracts = Contract::all(['id', 'contract_label']);
        $operators = Operator::all(['id', 'title']);
        $currencies = Currency::all(['id', 'title']);
        $ServiceTypes = ServiceTypes::all(['id', 'service_type_title']);
        return view('revenue.create', compact('contracts', 'operators', 'currencies', 'ServiceTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'contract_id' => 'required',
            'year' => 'required',
            'month' => 'required',
            'source_type' => 'required',
            'source_id' => 'required',
            'amount' => 'required',
            'currency_id' => 'required',
            'serivce_type_id' => 'required',
            'is_collected' => 'required',
            'reports' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $revenue['contract_id'] = $request->contract_id;
        $revenue['year'] = $request->year;
        $revenue['month'] = $request->month;
        $revenue['source_type'] = $request->source_type;
        $revenue['source_id'] = $request->source_id;
        $revenue['amount'] = $request->amount;
        $revenue['currency_id'] = $request->currency_id;
        $revenue['serivce_type_id'] = $request->serivce_type_id;
        $revenue['is_collected'] = $request->is_collected;
        $revenue['notes'] = $request->notes;

        $storagePath = Storage::disk('local')->put('uploads/revenue', $request->reports);
        $revenue['reports'] = basename($storagePath);

        $revenue = Revenue::create($revenue);

        if($request->service){
            foreach ($request->service as $key => $amount) {
                $revenue->amount_services()->sync([ $key => [ 'amount' => $amount ] ], false);
            }
        }

        Mail::send('emails.revenu', ['revenu' => $revenue], function ($m) {
          $m->to('emad@ivas.com.eg')->subject('revenue');
        });

      return redirect('revenue')->with('success', 'revenue created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Revenue  $revenue
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $revenue = Revenue::findOrFail($id);

        return view('revenue.show', compact('revenue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Revenue  $revenue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $revenue = Revenue::findOrFail($id);
        $contracts = Contract::all(['id', 'contract_label']);
        $operators = Operator::all(['id', 'title']);
        $currencies = Currency::all(['id', 'title']);
        $ServiceTypes = ServiceTypes::all(['id', 'service_type_title']);

        return view('revenue.edit', compact('revenue', 'contracts', 'operators', 'currencies', 'ServiceTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Revenue  $revenue
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $update_revenue = Revenue::findOrFail($id);

        $rules = array(
            'contract_id' => 'required',
            'year' => 'required',
            'month' => 'required',
            'source_type' => 'required',
            'source_id' => 'required',
            'amount' => 'required',
            'currency_id' => 'required',
            'serivce_type_id' => 'required',
            'is_collected' => 'required',
        );


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $revenue['contract_id'] = $request->contract_id;
        $revenue['year'] = $request->year;
        $revenue['month'] = $request->month;
        $revenue['source_type'] = $request->source_type;
        $revenue['source_id'] = $request->source_id;
        $revenue['amount'] = $request->amount;
        $revenue['currency_id'] = $request->currency_id;
        $revenue['serivce_type_id'] = $request->serivce_type_id;
        $revenue['is_collected'] = $request->is_collected;
        $revenue['notes'] = $request->notes;

        if($request->has('reports')){
            $storagePath = Storage::disk('local')->put('uploads/revenue', $request->reports);
            $revenue['reports'] = basename($storagePath);
        }

        $update_revenue->update($revenue);

        if($request->service){
            foreach ($request->service as $key => $amount) {
                $update_revenue->amount_services()->sync([ $key => [ 'amount' => $amount ] ], false);
            }
        }

        Mail::send('emails.revenu', ['revenu' => $update_revenue], function ($m) {
            $m->to('emad@ivas.com.eg')->subject('revenue');
        });

        return redirect('revenue')->with('success', 'revenue updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Revenue  $revenue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $revenue = Revenue::findOrfail($id)->delete();

        return back()->with('success', 'Deleted successfully');
    }

    public function comboSelectSourceId(Request $request)
    {
        if($request->source_type == 1)
        return Operator::all(['id', 'title']);
        return Party::where('second_party_type_id', 1)->select( array( 'second_party_id AS id', 'second_party_title AS title' ) )->get();
    }

    public function comboSelectContractServices(Request $request)
    {
        $contract_id = $request->contract_id;
        $contract = Contract::find($contract_id);
        return $contract->contract_service;
    }

    public function comboSelectRemoveContractServices(Request $request)
    {
        $service_id = $request->service_id;
        $ContractService = ContractService::find($service_id);
        $ContractService->delete();
        return 'true';
    }
}
