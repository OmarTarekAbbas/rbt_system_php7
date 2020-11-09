<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provider;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Validator;

/**
 * Class ProviderController.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:15:31am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ProviderController extends Controller
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
        $title = 'Index - provider';
        $providers = Provider::paginate(6);

        return view('provider.index',compact('providers','title'));
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
                'title' => 'required|unique:providers,title'
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $provider = new Provider();


        $provider->title = $request->title;

        $provider->save();

        $request->session()->flash('success', 'Created successfuly');

        return redirect('provider');
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
                'title' => 'required|unique:providers,title,'.$request->provider_id
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $provider = Provider::findOrfail($request->provider_id);

        $provider->title = $request->title;


        $provider->save();

        $request->session()->flash('success', 'Updated successfuly');

        return redirect('provider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
     	$provider = Provider::findOrfail($id);
     	$provider->delete();

        $request->session()->flash('success', 'Deleted successfuly');

        return back();
    }
}
