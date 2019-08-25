<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Validator;
/**
 * Class CountryController.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:13:56am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - country';
        $countries = Country::all();
        return view('country.index',compact('countries','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - country';
        
        return view('country.create');
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

        $country = new Country();

        
        $country->title = $request->title;

        
        
        $country->save();
        
        $request->session()->flash('success', 'Created successfuly');

        return back();
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
        // return $request->all();
        $validator = Validator::make($request->all(),[
                'title' => 'required|unique:countries,title,'.$request->country_id
            ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $country = Country::findOrfail($request->country_id);
    	
        $country->title = $request->title;
        
        
        $country->save();

        $request->session()->flash('success', 'Updated successfuly');
        return redirect('country');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
     	$country = Country::findOrfail($id);
     	$country->delete();

        $request->session()->flash('success', 'Deleted successfuly');

        return back();
    }
}
