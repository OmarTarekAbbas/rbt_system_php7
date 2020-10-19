<?php


namespace App\Http\Services;

use App\Contract;
use App\Contract_Items_Approvids;
use App\ContractItem;
use App\Department;
use PDF;
use App\Notification;

class ContractService
{
  /**
   * @var IMAGE_PATH
   */
  const IMAGE_PATH = 'contracts/';
  /**
   * __construct
   *
   * @param  UploaderService $UploaderService
   */
  public function __construct(UploaderService $UploaderService)
  {
    $this->UploaderService = $UploaderService;
  }
  /**
   * handle function that make update for contract
   * @param array $request
   * @return Contract
   */
  public function handle($request, $contractId = null)
  {
    $contract = new Contract();

    if ($contractId) {
      $contract = Contract::find($contractId);
    }

    $request = array_merge($request, [
      "contract_code"  =>  'C#' . date('Y') . "/" . date('m') . "/" . date('d') . "/" . time(),
      "operator_title" => implode(",", $request['operator_title']),
      "country_title"  => implode(",", $request['country_title']),
      "second_party_percentage"  => 100 - $request['first_party_percentage'],
      "entry_by_details" => auth()->user()->name
    ]);

    if (isset($request['contract_pdf'])) {
      $request = array_merge($request, [
        "contract_pdf"  =>  $this->handleFile($request['contract_pdf'])
      ]);
    }

    $contract->fill($request);

    $contract->save();

    if(request()->filled('items')){
      $this->createContractItems($contract, request('items'), request('department_ids'));
    }

    if(request()->filled('new_items')){
      $this->createContractItems($contract, request('new_items'), request('new_department_ids'));
    }

    if(request()->filled('items') || request()->filled('new_items')) {
      $this->generatePdf($contract);
    }

    return $contract;
  }

  /**
   * handle function that make update for role
   * @param UploadedFile|string $request
   * @return string
   */
  public function handleFile($value)
  {
    return $this->uploaderService->upload($value, self::IMAGE_PATH);
  }

  /**
   * createContractItems
   *
   * @param  Contract $contract
   * @param  array $data
   * @return void
   */
  public function createContractItems($contract, $items, $department_ids)
  {

    foreach ($items as $key => $item) {
      $contract_item = ContractItem::create([
        'item' => $item,
        'contract_id' => $contract->id,
        'department_ids' => isset($department_ids[$key]) || !empty($department_ids[$key]) ? implode(',', $department_ids[$key]) : '',
        'fullapproves' => isset($department_ids[$key]) || !empty($department_ids[$key]) ? 0 : 1
      ]);
      if (isset($department_ids[$key]) || !empty($department_ids[$key])) {
        $this->contract_items_send_email($contract_item, $department_ids[$key]);
      }
    }
  }

  /**
   * Method generatePdf
   *
   * @param Contract $contract
   *
   * @return void
   */
  public function generatePdf($contract)
  {
    $file = $contract->id . time() . '.pdf';
    $contract->contract_pdf = $file;
    $contract->save();
    $template_items = $contract->items;
    $content = view('fullcontracts.template', compact('template_items'))->render();

    $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf::SetTitle($contract->title);

    // set some language dependent data:
    $lg = array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'ar';
    $lg['w_page'] = 'page';
    // set some language-dependent strings (optional)
    $pdf::setLanguageArray($lg);
    $pdf::setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf::setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf::SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf::SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);
    $pdf::setFontSubsetting(true);
    $pdf::SetFont('freeserif', '', 12);
    $pdf::AddPage();
    $pdf::writeHTML($content, true, false, true, false, '');

    $pdf::Output(base_path('uploads/contracts') . '/' . $file, 'F');
  }

  /**
   * Method contract_items_send_email
   *
   * @param ContractItem $contract_item
   * @param Array $department_ids
   *
   * @return void
   */
  public function contract_items_send_email($contract_item, $department_ids)
  {
    $subject = "new contract is created";
    $message  = '<!DOCTYPE html>
      <html lang="en">
      <head>
      </head>
      <body>
      <center> <strong>' . $contract_item->contract->contract_code . ' ' . $contract_item->contract->contract_label . '</strong> </center>
      </br>
      ' . $contract_item->item . '
      </body>
      </html>';
    $departments = Department::whereIn('id', $department_ids)->get();

    foreach ($departments as $department) {
      $contract_items_approvids = new Contract_Items_Approvids();
      $contract_items_approvids->user_id = $department->manager->id;
      $contract_items_approvids->contract_item_id = $contract_item->id;
      if ($contract_items_approvids->save()) {
        $Url = url('contract_items_send/' . $contract_items_approvids->id . '/edit');
        $notification = new Notification();
        $notification->notifier_id = 1;
        $notification->notified_id = $department->manager->id;
        $notification->subject = 'There is new contract items with label and code ' . $contract_item->contract->contract_code . ' ' . $contract_item->contract->contract_label . ' needed to approve ';
        $notification->link = $Url;
        $notification->seen = 0;
        $notification->save();
      }
    }
    $resend_email = $departments->pluck('email')->toArray();
    $this->sendEmail($subject, $message, $resend_email);
  }

  /**
   * Method sendEmail
   *
   * @param String $subject
   * @param String $message
   * @param Array $resend_email
   *
   * @return void
   */
  public function sendEmail($subject, $message, $resend_email)
  {
    $email_department = $resend_email;
    $email_message = $message;
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: ivas_system';
    \Mail::send([], [], function ($message) use ($email_department, $email_message, $subject) {
      $message->from('rbt@gmail.com', 'ivas_system');
      $message->to($email_department)->subject($subject);
      $message->setBody($email_message, 'text/html');
    });
  }
}
