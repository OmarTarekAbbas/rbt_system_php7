<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Contract;
use Illuminate\Http\Request;
use App\Http\Repository\AttachmentRepository;
use App\Http\Requests\AttachmentStoreRequest;
use App\Http\Services\AttachmentStoreService;
use App\Http\Requests\AttachmentUpdateRequest;
use App\Http\Services\AttachmentUpdateService;

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
    ){
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AttachmentStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttachmentStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attachment  $Attachment
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $Attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attachment  $Attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(Attachment $Attachment)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  var $id
     * @return redirect
     */
    public function destroy($id)
    {
        //
    }
}
