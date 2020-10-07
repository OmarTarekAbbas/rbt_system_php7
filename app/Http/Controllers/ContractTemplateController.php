<?php

namespace App\Http\Controllers;

use App\Http\Repository\ContractTemplateRepository;
use App\Http\Repository\ContractTemplateItemRepository;
use App\Http\Requests\ContractTemplateStoreRequest;
use App\Http\Services\ContractTemplateStoreService;
use App\Http\Services\ContractTemplateUpdateService;
use Illuminate\Http\Request;

class ContractTemplateController extends Controller
{

    /**
     * ContractTemplateRepository
     *
     * @var ContractTemplateRepository
     */
    private $ContractTemplateRepository;
    /**
     * ContractTemplateItemRepository
     *
     * @var ContractTemplateItemRepository
     */
    private $ContractTemplateItemRepository;
    /**
     * ContractTemplateStoreService
     *
     * @var ContractTemplateStoreService
     */
    private $ContractTemplateStoreService;
    /**
     * ContractTemplateUpdateService
     *
     * @var ContractTemplateUpdateService
     */
    private $ContractTemplateUpdateService;

    /**
     * __construct
     *
     * @param ContractTemplateRepository $ContractTemplateRepository
     * @param ContractTemplateItemRepository $ContractTemplateItemRepository
     * @param ContractTemplateStoreService $ContractTemplateStoreService
     * @param ContractTemplateUpdateService $ContractTemplateUpdateService
     */

    public function __construct(
        ContractTemplateRepository $ContractTemplateRepository,
        ContractTemplateItemRepository $ContractTemplateItemRepository,
        ContractTemplateStoreService $ContractTemplateStoreService,
        ContractTemplateUpdateService $ContractTemplateUpdateService
    ) {
        $this->ContractTemplateRepository = $ContractTemplateRepository;
        $this->ContractTemplateItemRepository = $ContractTemplateItemRepository;
        $this->ContractTemplateStoreService = $ContractTemplateStoreService;
        $this->ContractTemplateUpdateService = $ContractTemplateUpdateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ContractTemplates = $this->ContractTemplateRepository->get();
        return view('ContractTemplate.index', compact('ContractTemplates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ContractTemplate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContractTemplateStoreRequest $request
     * @return Redirect
     */
    public function store(ContractTemplateStoreRequest $request)
    {
        $this->ContractTemplateStoreService->handle($request->validated());

        return redirect('ContractTemplate')->with(['success' => 'Second Party Type created successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $ContractTemplate = $this->ContractTemplateRepository->findOrFail($id);
        return view('ContractTemplate.edit', compact('ContractTemplate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContractTemplateStoreRequest  $request
     * @param  int  $id
     * @return Redirect
     */
    public function update(ContractTemplateStoreRequest $request, $id)
    {
        $ContractTemplate = $this->ContractTemplateRepository->findOrFail($id);

        $this->ContractTemplateUpdateService->handle($request->validated(), $ContractTemplate);

        return redirect('ContractTemplate')->with(['success' => 'Second Party Type created updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ContractTemplate = $this->ContractTemplateRepository->destroy($id);
      return back()->with(['success', 'Deleted Successfully']);
    }

    /**
     * show contract terms.
     *
     * @param  int  $id
     * @return View
     */
    public function showContractTerms($id)
    {
      $ContractTemplate = $this->ContractTemplateRepository->findOrFail($id);
      $ContractTemplateItems = $ContractTemplate->items;
      return view('ContractTemplate.items', compact('ContractTemplate', 'ContractTemplateItems'));
    }

    /**
     * store contract terms.
     *
     * @param  int  $id
     * @return View
     */
    public function storeContractTerms(Request $request, $id)
    {
      $ContractTemplate = $this->ContractTemplateRepository->findOrFail($id);

      $ContractTemplateItem['contract_id'] = $ContractTemplate->id;
      $ContractTemplateItem['item'] = $request->item;

      $ContractTemplateItem = $this->ContractTemplateItemRepository->create($ContractTemplateItem);

      $response['item_id'] = $ContractTemplateItem->id;
      $response['response'] = 'success';
      return $response;
    }

    /**
     * edit contract terms.
     *
     * @param  int  $id
     */
    public function editContractTerms(Request $request, $id)
    {
      $ContractTemplateItem = $this->ContractTemplateItemRepository->find($id);

      $ContractTemplateItem->item = $request->item;

      $ContractTemplateItem->save();

      return 'success';
    }

    /**
     * destroy contract terms.
     *
     * @param  int  $id
     */
    public function destroyContractTerms($id)
    {
      $ContractTemplate = $this->ContractTemplateItemRepository->destroy($id);
      return 'success';
    }

}
