<?php

namespace App\Http\Controllers;

use URL;
use App\Type;
use Validator;
use App\ServiceTypes;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
/**
 * Class TypeController.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:25:28am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - type';
        $types = ServiceTypes::paginate(6);
        return view('type.index',compact('types','title'));
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

        $type = new ServiceTypes();


        $type->service_type_title = $request->title;



        $type->save();

        $request->session()->flash('success', 'Created successfuly');

        return redirect('type');
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

        $type = ServiceTypes::findOrfail($request->type_id);

        $type->title = $request->title;

        $type->save();

        $request->session()->flash('success', 'Updated successfuly');


        return redirect('type');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
     	$type = ServiceTypes::findOrfail($id);
     	$type->delete();
        $request->session()->flash('success', 'Deleted successfuly');

        return back();;
    }
}
