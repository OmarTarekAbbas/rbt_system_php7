<?php

namespace App\Http\Controllers;

use App\Http\Repository\SecondPartyTypeRepository;
use App\Http\Requests\SecondPartyTypeStoreRequest;
use App\Http\Services\SecondPartyTypeStoreService;
use App\Http\Services\SecondPartyTypeUpdateService;
use Illuminate\Http\Request;

class SecondPartyTypeController extends Controller
{

    /**
     * SecondPartyTypeRepository
     *
     * @var SecondPartyTypeRepository
     */
    private $SecondPartyTypeRepository;
    /**
     * SecondPartyTypeStoreService
     *
     * @var SecondPartyTypeStoreService
     */
    private $SecondPartyTypeStoreService;
    /**
     * SecondPartyTypeUpdateService
     *
     * @var SecondPartyTypeUpdateService
     */
    private $SecondPartyTypeUpdateService;

    /**
     * __construct
     *
     * @param SecondPartyTypeRepository $SecondPartyTypeRepository
     * @param SecondPartyTypeStoreService $SecondPartyTypeStoreService
     * @param SecondPartyTypeUpdateService $SecondPartyTypeUpdateService
     */

    public function __construct(
        SecondPartyTypeRepository $SecondPartyTypeRepository,
        SecondPartyTypeStoreService $SecondPartyTypeStoreService,
        SecondPartyTypeUpdateService $SecondPartyTypeUpdateService
    ) {
        $this->SecondPartyTypeRepository = $SecondPartyTypeRepository;
        $this->SecondPartyTypeStoreService = $SecondPartyTypeStoreService;
        $this->SecondPartyTypeUpdateService = $SecondPartyTypeUpdateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SecondPartyTypes = $this->SecondPartyTypeRepository->get();
        return view('secondpartytype.index', compact('SecondPartyTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secondpartytype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SecondPartyTypeStoreRequest $request
     * @return Redirect
     */
    public function store(SecondPartyTypeStoreRequest $request)
    {
        $this->SecondPartyTypeStoreService->handle($request->validated());

        return redirect('SecondPartyType')->with(['success' => 'Second Party Type created successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $SecondPartyType = $this->SecondPartyTypeRepository->findOrFail($id);
        return view('secondpartytype.edit', compact('SecondPartyType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SecondPartyTypeStoreRequest  $request
     * @param  int  $id
     * @return Redirect
     */
    public function update(SecondPartyTypeStoreRequest $request, $id)
    {
        $SecondPartyType = $this->SecondPartyTypeRepository->findOrFail($id);

        $this->SecondPartyTypeUpdateService->handle($request->validated(), $SecondPartyType);

        return redirect('SecondPartyType')->with(['success' => 'Second Party Type created updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $SecondPartyType = $this->SecondPartyTypeRepository->destroy($id);
      return back()->with(['success', 'Deleted Successfully']);
    }
}
