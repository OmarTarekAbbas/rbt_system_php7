<?php

namespace App\Http\Controllers;

use App\Contract;




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
        return view('fullcontracts.create');
    }

    public function store()
    {
        dd("omar");
    }
}
