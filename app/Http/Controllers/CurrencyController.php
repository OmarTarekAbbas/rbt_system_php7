<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Currency;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Validator;

/**
 * Class CurrencyController.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:24:17am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class CurrencyController extends Controller
{

  public function __construct()
  {
    $this->get_privilege();
  }

    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - currency';
        $currencies = Currency::all();
        return view('currency.index',compact('currencies','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'title' => 'required|unique:types,title'
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $currency = new Currency();


        $currency->title = $request->title;



        $currency->save();

        $request->session()->flash('success', 'Created successfuly');

        return redirect('currency');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|unique:currencies,title,'.$request->currency_id
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $currency = Currency::findOrfail($request->currency_id);

        $currency->title = $request->title;

        $currency->save();

        $request->session()->flash('success', 'Updated successfuly');

        return redirect('currency');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
     	$currency = Currency::findOrfail($id);
     	$currency->delete();

        $request->session()->flash('success', 'Deleted successfuly');

        return back();
    }
}
