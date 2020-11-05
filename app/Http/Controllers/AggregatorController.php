<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aggregator;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Validator;
/**
 * Class AggregatorController.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:11:57am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class AggregatorController extends Controller
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
        $title = 'Index - aggregator';
        $aggregators = Aggregator::all();
        return view('aggregator.index',compact('aggregators','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - aggregator';

        return view('aggregator.create');
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
                'title' => 'required|unique:aggregators,title'
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $aggregator = new Aggregator();


        $aggregator->title = $request->title;



        $aggregator->save();

        $request->session()->flash('success', 'Created successfuly');

        return redirect('aggregator');
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
                'title' => 'required|unique:aggregators,title,'.$request->aggregator_id
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $aggregator = Aggregator::findOrfail($request->aggregator_id);

        $aggregator->title = $request->title;


        $aggregator->save();

        $request->session()->flash('success', 'Updated successfuly');

        return redirect('aggregator');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
     	$aggregator = Aggregator::findOrfail($id);
     	$aggregator->delete();

        $request->session()->flash('success', 'Deleted successfuly');

        return back();
    }
}
