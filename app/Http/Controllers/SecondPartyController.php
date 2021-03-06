<?php

namespace App\Http\Controllers;

use App\Rbt;
use App\Content;
use App\Contract;
use App\Provider;
use App\SecondParties;
use Illuminate\Http\Request;
use App\Http\Repository\SecondPartyRepository;
use App\Http\Requests\SecondPartyStoreRequest;
use App\Http\Services\SecondPartyStoreService;
use App\Http\Requests\SecondPartyUpdateRequest;
use App\Http\Services\SecondPartyUpdateService;
use App\Http\Repository\SecondPartyTypeRepository;

class SecondPartyController extends Controller
{
    /**
     * SecondPartyRepository
     * @var SecondPartyRepository
     */
    private $SecondPartyRepository;
    /**
     * SecondPartyTypeRepository
     * @var SecondPartyTypeRepository
     */
    private $SecondPartyTypeRepository;
    /**
     * SecondPartyStoreService
     * @var SecondPartyStoreService
     */
    private $SecondPartyStoreService;
    /**
     * SecondPartyUpdateService
     * @var SecondPartyUpdateService
     */
    private $SecondPartyUpdateService;

    /**
     * __construct
     *
     * @param SecondPartyRepository $SecondPartyRepository
     */

    public function __construct(
        SecondPartyRepository $SecondPartyRepository,
        SecondPartyTypeRepository $SecondPartyTypeRepository,
        SecondPartyStoreService $SecondPartyStoreService,
        SecondPartyUpdateService $SecondPartyUpdateService
    ) {
      $this->get_privilege();
        $this->SecondPartyRepository = $SecondPartyRepository;
        $this->SecondPartyTypeRepository = $SecondPartyTypeRepository;
        $this->SecondPartyStoreService = $SecondPartyStoreService;
        $this->SecondPartyUpdateService = $SecondPartyUpdateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $SecondPartys = $this->SecondPartyRepository->get();
        return view('secondparty.index', compact('SecondPartys'));
    }

    public function allData(Request $request)
    {
      $SecondPartys = $this->SecondPartyRepository->get();
        $datatable = \Datatables::of($SecondPartys)
            ->addColumn('index', function (SecondParties $SecondParty) {
                return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$SecondParty->second_party_id.'" class="roles" onclick="collect_selected(this)">';
            })
            ->addColumn('id', function (SecondParties $SecondParty) {
                return $SecondParty->second_party_id;
            })
            ->addColumn('secondparty_type', function (SecondParties $SecondParty) {
              return $SecondParty->type->second_party_type_title;
          })
            ->addColumn('second_party_title', function (SecondParties $SecondParty) {
                return $SecondParty->second_party_title;
            })
            ->addColumn('second_party_joining_date', function (SecondParties $SecondParty) {
              return $SecondParty->second_party_joining_date;
          })
          ->addColumn('second_party_terminate_date', function (SecondParties $SecondParty) {
            return $SecondParty->second_party_terminate_date;
          })
            ->addColumn('second_party_status', function (SecondParties $SecondParty) {
              return $SecondParty->second_party_status;
          })
          ->addColumn('second_party_identity', function (SecondParties $SecondParty) {
            if($SecondParty->second_party_identity && file_exists(base_path("uploads/docs/".$SecondParty->second_party_identity)))
              return '<td><a class="btn btn-primary" target="_blank" href="'.url("uploads/docs/".$SecondParty->second_party_identity).'">Preview</a></td>';
            else
              return '<td><a class="btn disabled">No File</a></td>';
          })

          ->addColumn('second_party_cr', function (SecondParties $SecondParty) {
            if($SecondParty->second_party_cr && file_exists(base_path("uploads/docs/".$SecondParty->second_party_cr)))
              return '<td><a class="btn btn-primary" target="_blank" href="'.url("uploads/docs/".$SecondParty->second_party_cr).'">Preview</a></td>';
            else
              return '<td><a class="btn disabled">No File</a></td>';
          })

          ->addColumn('second_party_tc', function (SecondParties $SecondParty) {
            if($SecondParty->second_party_tc && file_exists(base_path("uploads/docs/".$SecondParty->second_party_tc)))
              return '<td><a class="btn btn-primary" target="_blank" href="'.url("uploads/docs/".$SecondParty->second_party_tc).'">Preview</a></td>';
            else
              return '<td><a class="btn disabled">No File</a></td>';
          })
            ->addColumn('action', function (SecondParties $SecondParty) {
                    return view('secondparty.actions', compact('SecondParty'));
            })

            ->escapeColumns([])
            ->make(true);
        return $datatable;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $SecondPartyTypes = $this->SecondPartyTypeRepository->pluck('second_party_type_title', 'id');
        return view('secondparty.create', compact('SecondPartyTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SecondPartyStoreRequest $request
     * @return redirect
     */
    public function store(SecondPartyStoreRequest $request)
    {
        $SecondParty = $this->SecondPartyStoreService->handle($request->validated());
        return redirect('SecondParty')->with(['success' => 'Added Successfully!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $SecondPartyTypes = $this->SecondPartyTypeRepository->pluck('second_party_type_title', 'id');
        $SecondParty = $this->SecondPartyRepository->where('second_party_id', $id)->firstOrFail();
        return view('secondparty.edit', compact('SecondParty', 'SecondPartyTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SecondPartyUpdateRequest  $request
     * @param  int  $id
     * @return redirect
     */
    public function update(SecondPartyUpdateRequest $request, $id)
    {
        $SecondParty = $this->SecondPartyRepository->where('second_party_id', $id)->firstOrFail();
        $this->SecondPartyUpdateService->handle($request->validated(), $SecondParty);
        return redirect('SecondParty')->with(['success' => 'Updated Successfully!']);
    }

    public function show()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SecondParty = $this->SecondPartyRepository->where('second_party_id', $id)->first();
        if($SecondParty->contracts->count()){
          return back()->with(['failed' => 'This Second Party Have Contracts']);
        }
        $SecondParty->delete();
        return back()->with(['success' => 'Deleted Successfully']);

    }

    public function providers_to_secondparty() {

      $providers = Provider::all();

      foreach( $providers as $provider ){

        $exist_secondparty = SecondParties::where('second_party_title', $provider->title)->first();

        if( $exist_secondparty ){

          $create_secondparty = $exist_secondparty;

        }else{

          $secondparty['second_party_title'] = $provider->title;
          $secondparty['second_party_type_id'] = PROVIDER_ID;

          $create_secondparty = SecondParties::create( $secondparty );

        }

        $contents = Content::where( 'provider_id' , $provider->id )->get();

        foreach( $contents as $content ){

          $content->provider_id = $create_secondparty->second_party_id;

          $content->save();

        }

        $rbts = Rbt::where( 'provider_id' , $provider->id )->get();

        foreach( $rbts as $rbt ){

          $rbt->provider_id = $create_secondparty->second_party_id;

          $rbt->save();

        }

      }

  }

}
