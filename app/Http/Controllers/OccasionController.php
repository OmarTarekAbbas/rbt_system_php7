<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Occasion;
use Amranidev\Ajaxis\Ajaxis;
use App\Country;
use URL;
use Validator;

/**
 * Class OccasionController.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:16:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class OccasionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - occasion';
        $occasions = Occasion::paginate(6);
        $countries = Country::all()->pluck('title','id');
        return view('occasion.index',compact('occasions','title','countries'));
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
                'title' => 'required|unique:countries,title'
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $occasion = new Occasion();


        $occasion->title = $request->title;

        $occasion->country_id = $request->country_id;



        $occasion->save();
        $request->session()->flash('success', 'Created successfuly');
        return redirect('occasion');
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
          'title' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $occasion = Occasion::findOrfail($request->occasion_id);

        $occasion->title = $request->title;

        $occasion->country_id = $request->country_id;

        $occasion->save();

        $request->session()->flash('success', 'Updated successfuly');

        return redirect('occasion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
     	$occasion = Occasion::findOrfail($id);
     	$occasion->delete();
        $request->session()->flash('success', 'Deleted successfuly');
        return back();
    }
}
