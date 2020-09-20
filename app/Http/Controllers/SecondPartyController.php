<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\SecondPartyRepository;
use App\Http\Requests\SecondPartyStoreRequest;
use App\Http\Services\SecondPartyStoreService;
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
     * __construct
     *
     * @param SecondPartyRepository $SecondPartyRepository
     */
    public function __construct(
      SecondPartyRepository $SecondPartyRepository,
      SecondPartyTypeRepository $SecondPartyTypeRepository,
      SecondPartyStoreService $SecondPartyStoreService
    )
    {
      $this->SecondPartyRepository = $SecondPartyRepository;
      $this->SecondPartyTypeRepository = $SecondPartyTypeRepository;
      $this->SecondPartyStoreService = $SecondPartyStoreService;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $SecondParty = $this->SecondPartyRepository->where('second_party_id', $id)->delete();
      return back()->with(['success' => 'Deleted Successfully']);
    }
}
