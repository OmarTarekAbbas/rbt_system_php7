<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Http\Controllers\Controller;
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

        return redirect('clientPayments');
    }

    /**
     * Show the form for editing the specified resource.
     * @param    int  $id
     * @return  View
     */
    public function edit($id)
    {
        $clientPayment = $this->clientPaymentRepository->findOrfail($id);

        return view('client_payment.edit',compact('clientPayment'));
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
