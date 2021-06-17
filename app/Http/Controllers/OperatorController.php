<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Operator;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Country;
use Validator;

/**
 * Class OperatorController.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:14:57am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class OperatorController extends Controller
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
        $title = 'Index - operator';
        $operators = Operator::all();
        $countries = Country::all()->pluck('title','id');
        return view('operator.index',compact('operators','title','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - operator';
        $countries = Country::all()->pluck('title','id');

        return view('operator.create',compact('title','countries'  ));
    }

    public function showOperatorCountry()
    {
        //dd("omar");
        $title = 'Create - operator';
        return view('operator.input',compact('title'));
    }

    public function show()
    {
        $title = 'Create - operator';
        return view('operator.input',compact('title'));
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
                'title' => 'required',
                'country_id' => 'required'
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $operator = Operator::where([['title',$request->title],['country_id',$request->country_id]])->first();
        if ($operator) {
            $request->session()->flash('failed', 'Operator Already Exists');
            return back();
        }

        $operator = new Operator();
        $operator->title = $request->title;
        $operator->country_id = $request->country_id;
        $operator->view_excel = $request->view_excel;
        $operator->save();
        $request->session()->flash('success', 'Created successfuly');
        return redirect('operator');
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
                'title' => 'required',
                'country_id' => 'required'
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $operator = Operator::where([['title',$request->title],['country_id',$request->country_id],['id','<>',$request->operator_id]])->first();
        if ($operator) {
            $request->session()->flash('failed', 'Operator Already Exists');
            return back();
        }

        $operator = Operator::findOrfail($request->operator_id);
        $operator->title = $request->title;
        $operator->country_id = $request->country_id;
        $operator->view_excel = $request->view_excel;
        $operator->save();

        $request->session()->flash('success', 'Updated successfuly');

        return redirect('operator');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
     	$operator = Operator::findOrfail($id);
     	$operator->delete();

        $request->session()->flash('success', 'Updated successfuly');

        return back();
    }

}
