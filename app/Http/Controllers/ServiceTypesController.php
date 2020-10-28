<?php

namespace App\Http\Controllers;

use App\ServiceTypes;
use Illuminate\Http\Request;

class ServiceTypesController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth', 'role:super_admin|legal'], ['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ServiceTypes = ServiceTypes::all();

        return view('servicetypes.index', compact('ServiceTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicetypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
          'service_type_title' => 'require'
        ]);

        $ServiceTypes = ServiceTypes::create($request->all());

        return back()->with(['success', 'Added Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ServiceType = ServiceTypes::find($id);
      return view('servicetypes.edit', compact('ServiceType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      \Validator::make($request->all(), [
        'service_type_title' => 'require'
      ]);

      $ServiceType = ServiceTypes::find($id)->update($request->all());

      return back()->with(['success', 'Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ServiceTypes = ServiceTypes::destroy($id);
      return back()->with(['success', 'Deleted Successfully']);
    }
}
