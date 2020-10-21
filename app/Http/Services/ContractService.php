<?php


namespace App\Http\Services;

use App\Contract;
use App\Contract_Items_Approvids;
use App\ContractItem;
use App\Department;
use App\Notification;
use Illuminate\Http\UploadedFile;

class ContractService
{
  /**
   * @var IMAGE_PATH
   */
  const IMAGE_PATH = '/contracts';
  /**
   * @var IMAGE_PATH
   */
  const SIGNATURE_IMAGE_PATH = '/contract_signatures';
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
        "contract_pdf"  =>  basename($this->handleFile($request['contract_pdf'], self::IMAGE_PATH))
      ]);
    }

    if (isset($request['first_party_signature'])) {

      $request = array_merge($request, [
        "first_party_signature"  =>  basename($this->handleFile($request['first_party_signature'] , self::SIGNATURE_IMAGE_PATH))
      ]);

    }

    if (isset($request['second_party_signature'])) {
      $request = array_merge($request, [
        "second_party_signature"  =>  basename($this->handleFile($request['second_party_signature'] , self::SIGNATURE_IMAGE_PATH))
      ]);

    }

    if (isset($request['first_party_seal'])) {
      $request = array_merge($request, [
        "first_party_seal"  =>  basename($this->handleFile($request['first_party_seal'] , self::SIGNATURE_IMAGE_PATH))
      ]);

    }

    if (isset($request['second_party_seal'])) {
      $request = array_merge($request, [
        "second_party_seal"  =>  basename($this->handleFile($request['second_party_seal'] , self::SIGNATURE_IMAGE_PATH))
      ]);
    }


    $contract->fill($request);

    $contract->save();

    if(request()->filled('items')){
      $this->createContractItems($contract, request()->get('items'), request()->get('department_ids'));
    }

    if(request()->filled('new_items')){
      $this->createContractItems($contract, request()->get('new_items'), request()->get('new_department_ids'));
    }

    if(request()->filled('items') || request()->filled('new_items')) {
      generatePdf($contract);
    }

    return $contract;
  }

  /**
   * handle function that make update for role
   * @param UploadedFile $value
   * @param string $path
   * @return string
   */
  public function handleFile($value, $path)
  {
    return $this->UploaderService->upload($value, $path);
  }

  /**
   * createContractItems
   *
   * @param  Contract $contract
   * @param  array $items
   * @param  array $items
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
