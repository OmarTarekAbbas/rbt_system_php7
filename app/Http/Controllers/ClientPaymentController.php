<?php

namespace App\Http\Controllers;

use App\ClientPayment;
use App\Currency;
use App\Http\Repository\ClientPaymentRepository;
use App\Http\Requests\ClientPaymentRequest;
use App\Http\Services\ClientPaymentService;
use App\SecondParties;

class ClientPaymentController extends Controller
{
    /**
     * ClientPaymentRepository
     *
     * @var ClientPaymentRepository
     */
    private $clientPaymentRepository;
    /**
     * ClientPaymentService
     *
     * @var ClientPaymentService
     */
    private $clientPaymentService;
    /**
     * __construct
     *
     * @param  ClientPaymentRepository $clientPaymentRepository
     * @param  ClientPaymentService $clientPaymentService
     */
    public function __construct(ClientPaymentRepository $clientPaymentRepository, ClientPaymentService $clientPaymentService)
    {
        $this->get_privilege();
        $this->clientPaymentRepository = $clientPaymentRepository;
        $this->clientPaymentService = $clientPaymentService;
    }

    /**
     * index
     * get all ClientPayment data
     * @return View
     */
    public function index()
    {
        $clientPayments = $this->clientPaymentRepository->get();
        return view('client_payment.index',compact('clientPayments'));
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
        $client_payments = $this->clientPaymentRepository
        ->select('*', 'client_payments.id AS id', 'second_parties.second_party_title as provider', 'currencies.title as currency', 'contracts.contract_code as contract_code', 'contracts.contract_label as contract_label', 'contracts.id as contract_id')
        ->join('second_parties', 'second_parties.second_party_id', '=', 'client_payments.second_party_id')
        ->join('currencies', 'currencies.id', '=', 'client_payments.currency_id')
        ->join('contracts', 'contracts.id', '=', 'client_payments.contract_id')
        ->latest('client_payments.id')
        ->get();

      $datatable = \Datatables::of($client_payments)
        ->addColumn('index', function (ClientPayment $client_payment) {
          return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$client_payment->id.'" class="roles" onclick="collect_selected(this)">';
        })
        ->addColumn('id', function (ClientPayment $client_payment) {
          return $client_payment->id;
        })
        ->addColumn('provider', function (ClientPayment $client_payment) {
          return $client_payment->provider;
        })
        ->addColumn('amount', function (ClientPayment $client_payment) {
            return $client_payment->amount;
        })
        ->addColumn('currency', function (ClientPayment $client_payment) {
            return $client_payment->currency;
        })
        ->addColumn('contract', function (ClientPayment $client_payment) {
          if ($client_payment->contract_code)
            return '<a  href="' . url("fullcontracts/$client_payment->contract_id") . '" >' . $client_payment->contract_code . " " . $client_payment->contract_label. '</a>';
          else
            return '---';
        })
        ->addColumn('year', function (ClientPayment $client_payment) {
            return $client_payment->year;
        })
        ->addColumn('months', function (ClientPayment $client_payment) {
            return $client_payment->month;
        })
        ->addColumn('action', function (ClientPayment $client_payment) {
            return view('client_payment.actions', compact('client_payment'));;
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
        $second_partys = SecondParties::all();
        $currenies     = Currency::all();
        return view('client_payment.create', compact('second_partys', 'currenies'));
    }

    public function show($id)
    {
      $clientPayment = $this->clientPaymentRepository->findOrfail($id);
      // dd($clientPayment);
      return view('client_payment.view', compact('clientPayment'));
    }

    /**
     * store ClientPayment data
     *
     * @param  ClientPaymentRequest $request
     * @return Redirect
     */
    public function store(ClientPaymentRequest $request)
    {
        $this->clientPaymentService->handle($request->validated());

        $request->session()->flash('success', 'ClientPayment created successfull');

        return redirect('clientpayments');
    }

    /**
     * Show the form for editing the specified resource.
     * @param    int  $id
     * @return  View
     */
    public function edit($id)
    {
        $clientPayment = $this->clientPaymentRepository->findOrfail($id);
        $second_partys = SecondParties::all();
        $currenies     = Currency::all();
        return view('client_payment.edit',compact('clientPayment', 'second_partys', 'currenies'));
    }

    /**
     * update
     *
     * @param  int $id
     * @param  ClientPaymentUpdateRequest $request
     * @return Redirect
     */
    public function update($id, ClientPaymentRequest $request)
    {

        $this->clientPaymentService->handle($request->validated(), $id);

        $request->session()->flash('success', 'updated successfully');
        // dd();
        return redirect('clientpayments');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ClientPayment = $this->clientPaymentRepository->findOrfail($id);

        $ClientPayment->delete();

        \Session::flash('success', 'deleted successfully');

        return back();
    }
}
