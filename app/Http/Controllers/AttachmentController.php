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
use Carbon\Carbon;


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
        $this->get_privilege();
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


    public function allData(Request $request)
    {

      $Attachments = $this->AttachmentRepository->get();
        $datatable = \Datatables::of($Attachments)
            ->addColumn('index', function (Attachment $Attachment) {
                return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$Attachment->id.'" class="roles" onclick="collect_selected(this)">';
            })
            ->addColumn('id', function (Attachment $Attachment) {
                return $Attachment->id;
            })
            ->addColumn('attachment_code', function (Attachment $Attachment) {
              return '<a target="_blank" href="'.url($Attachment->attachment_pdf).'">'.$Attachment->attachment_code.'</a>';
          })
            ->addColumn('contract', function (Attachment $Attachment) {
              return '<a href="'.url('fullcontracts/'.optional($Attachment->contract)->id).'">'.optional($Attachment->contract)->contract_code.' - '.optional($Attachment->contract)->contract_label.'</a>';
          })
            ->addColumn('attachment_type', function (Attachment $Attachment) {
                return $Attachment->attachment_type;
            })
            ->addColumn('attachment_title', function (Attachment $Attachment) {
                return $Attachment->attachment_title;
            })
            ->addColumn('attachment_date', function (Attachment $Attachment) {
                return $Attachment->attachment_date;
            })
            ->addColumn('attachment_expiry_date', function (Attachment $Attachment) {
              return $Attachment->attachment_expiry_date;
            })
            ->addColumn('contract_expiry_date', function (Attachment $Attachment) {
              return $Attachment->contract_expiry_date;
            })
            ->addColumn('attachment_pdf', function (Attachment $Attachment) {
              return '<a target="_blank" href="'.url($Attachment->attachment_pdf).'">Preview</a>';
            })
            ->addColumn('attachment_status', function (Attachment $Attachment) {
              return $Attachment->attachment_status;

            })
            ->addColumn('notes', function (Attachment $Attachment) {
              return $Attachment->notes;
            })
            ->addColumn('action', function (Attachment $Attachment) {
                    return view('attachments.actions', compact('Attachment'));
            })

            ->escapeColumns([])
            ->make(true);

        return $datatable;
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


    public function show()
    {

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

    public function attachment_expiry_date_index()
    {
        return view('attachments.index_expiry_date');
    }

    public function attachment_expiry_date(Request $request)
    {
      $Attachments = $this->AttachmentRepository->where('attachment_expiry_date','<',Carbon::now()->format('Y-m-d'))->get();
      $datatable = \Datatables::of($Attachments)
          ->addColumn('index', function (Attachment $Attachment) {
              return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$Attachment->id.'" class="roles" onclick="collect_selected(this)">';
          })
          ->addColumn('id', function (Attachment $Attachment) {
              return $Attachment->id;
          })
          ->addColumn('attachment_code', function (Attachment $Attachment) {
            return '<a target="_blank" href="'.url($Attachment->attachment_pdf).'">'.$Attachment->attachment_code.'</a>';
        })
          ->addColumn('contract', function (Attachment $Attachment) {
            return '<a href="'.url('fullcontracts/'.optional($Attachment->contract)->id).'">'.optional($Attachment->contract)->contract_code.' - '.optional($Attachment->contract)->contract_label.'</a>';
        })
          ->addColumn('attachment_type', function (Attachment $Attachment) {
              return $Attachment->attachment_type;
          })
          ->addColumn('attachment_title', function (Attachment $Attachment) {
              return $Attachment->attachment_title;
          })
          ->addColumn('attachment_date', function (Attachment $Attachment) {
              return $Attachment->attachment_date;
          })
          ->addColumn('attachment_expiry_date', function (Attachment $Attachment) {
            return $Attachment->attachment_expiry_date;
          })
          ->addColumn('contract_expiry_date', function (Attachment $Attachment) {
            return $Attachment->contract_expiry_date;
          })

          ->addColumn('attachment_pdf', function (Attachment $Attachment) {
            return '<a target="_blank" href="'.url($Attachment->attachment_pdf).'">Preview</a>';
          })

          ->addColumn('attachment_status', function (Attachment $Attachment) {
            return $Attachment->attachment_status;

          })
          ->addColumn('notes', function (Attachment $Attachment) {
            return $Attachment->notes;
          })
          ->addColumn('action', function (Attachment $Attachment) {
                  return view('attachments.actions', compact('Attachment'));
          })

          ->escapeColumns([])
          ->make(true);

      return $datatable;
    }
}
