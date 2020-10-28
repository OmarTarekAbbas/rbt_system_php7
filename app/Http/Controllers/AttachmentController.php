<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Contract;
use App\Http\Repository\AttachmentRepository;
use App\Http\Requests\AttachmentStoreRequest;
use App\Http\Requests\AttachmentUpdateRequest;
use App\Http\Services\AttachmentStoreService;
use App\Http\Services\AttachmentUpdateService;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{

    /**
     * AttachmentRepository
     * @var AttachmentRepository
     */
    private $AttachmentRepository;
    /**
     * AttachmentStoreService
     * @var AttachmentStoreService
     */
    private $AttachmentStoreService;
    /**
     * AttachmentUpdateService
     * @var AttachmentUpdateService
     */
    private $AttachmentUpdateService;

    /**
     * __construct
     *
     * @param SecondPartyRepository $SecondPartyRepository
     */
    public function __construct(
        AttachmentRepository $AttachmentRepository,
        AttachmentStoreService $AttachmentStoreService,
        AttachmentUpdateService $AttachmentUpdateService
        ) {
        $this->middleware(['auth', 'role:super_admin|legal'], ['except' => ['index']]);
        $this->AttachmentRepository = $AttachmentRepository;
        $this->AttachmentStoreService = $AttachmentStoreService;
        $this->AttachmentUpdateService = $AttachmentUpdateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Attachments = $this->AttachmentRepository->get();
        return view('attachments.index', compact('Attachments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contracts = Contract::pluck('contract_label', 'id');
        return view('attachments.create', compact('contracts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AttachmentStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttachmentStoreRequest $request)
    {
        $this->AttachmentStoreService->handle($request->validated());
        return redirect('attachment')->with(['success' => 'Added Successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attachment  $Attachment
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attachment  $Attachment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contracts = Contract::pluck('contract_label', 'id');
        $Attachment = $this->AttachmentRepository->find($id);
        return view('attachments.edit', compact('contracts', 'Attachment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AttachmentUpdateRequest  $request
     * @param  var $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttachmentUpdateRequest $request, $id)
    {
        $Attachment = $this->AttachmentRepository->find($id);
        $this->AttachmentUpdateService->handle($request->validated(), $Attachment);
        return redirect('attachment')->with(['success' => 'Updated Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  var $id
     * @return redirect
     */
    public function destroy($id)
    {
        $Attachment = $this->AttachmentRepository->destroy($id);
        return back()->with(['success' => 'Deleted Successfully']);
    }
}
