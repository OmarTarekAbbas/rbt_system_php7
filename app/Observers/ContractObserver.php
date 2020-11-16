<?php

namespace App\Observers;

use App\Constants\CeoRenewStatus;
use App\Contract;
use App\Department;
use App\Http\Services\ContractRenewService;
use App\Notification;
use App\User;

class ContractObserver
{
    /**
      * contractRenewService
      * @var ContractRenewService $contractRenewService
      */
    private $contractRenewService;
    /**
     * Method __construct
     *
     * @param ContractRenewService $contractRenewService
     *
     * @return void
     */
    public function __construct(ContractRenewService $contractRenewService)
    {
      $this->contractRenewService = $contractRenewService;
    }
    /**
     * Method saved
     * function work after save contract
     * @return void
     */
    public function saved(Contract $contract)
    {
      if ($contract->isDirty('full_approves') && $contract->full_approves && !$contract->ceo_approve) {
        $url = url('ceo/' . $contract->id . '/approve');
        $this->sendCeoNotifocation($contract, $url);
        $this->sendCeoEmail($contract, $url);
      }

      if (!isset($contract->contract_code)) {
        $serviceTypeId = $contract->service_type_id;
        $first_party_title = strtolower(substr(optional($contract->first_parties)->first_party_title,0,2));
        $second_party_id = optional($contract->second_parties)->second_party_id;
        $second_party_type_id = optional($contract->second_party_type)->id;
        $contract_id = $contract->id;
        $contract->contract_code = $serviceTypeId.'-'.$first_party_title.'-'.$second_party_id.'-'.$second_party_type_id.'-'.$contract_id;

        $contract->save();
      }

      if ($contract->isDirty('ceo_approve') && $contract->ceo_approve) {
        $this->updateContractItems($contract);
        foreach($contract->items as $item) {
          $department_mails = Department::whereIn('id',explode(',', $item->department_ids))->pluck('email')->toArray();
          $this->sendDepartmentEmail($contract,$item->item,$department_mails);
        }
      }

      if ($contract->isDirty('ceo_renew') && $contract->ceo_renew == CeoRenewStatus::RENEW) {
        $data['contract_id']       = $contract->id;
        $data['renew_start_date']  = request()->get('renew_start_date');
        $data['renew_expire_date'] = request()->get('renew_expire_date');
        $data['renew_duration_id'] = request()->get('renew_duration_id');
        $this->contractRenewService->handle($data);
      }
    }

    /**
     * Method createNewItems
     *
     * @param Contract $contract
     *
     * @return void
     */
    public function updateContractItems($contract)
    {
      foreach ($contract->items as $key => $item) {
        $item->item = request('items')[$key];
        $item->save();
      }
      $contract = Contract::find($contract->id);
      generatePdf($contract);
    }

    /**
     * Method sendCeoNotifocation
     *
     * @param Contract $contract
     * @param String $url
     * @return void
     */
    public function sendCeoNotifocation($contract, $url)
    {
      $notification = new Notification();
      $notification->notifier_id = 1;
      $notification->notified_id = optional(ceo_data())->id;
      $notification->subject = 'Kindly check this contract '.$contract->contract_code . ' ' . $contract->contract_label.' to be fullapprove from your side';
      $notification->link = $url;
      $notification->seen = 0;
      $notification->save();
    }

    /**
     * Method sendCeoEmail
     *
     * @param Contract $contract
     * @param String $url
     *
     * @return void
     */
    public function sendCeoEmail($contract, $url)
    {
      $subject = "CEO Approve";
      $message  = '<!DOCTYPE html>
        <html lang="en">
            <head>
            </head>
            <body>
            <center> <strong>'. $contract->contract_code . ' ' . $contract->contract_label. '</strong> </center>
            </br>
            <strong> Kindly check this contract '.$contract->contract_code . ' ' . $contract->contract_label.
            ' from this <a href="'.$url.'"> Link </a> </br> To fullapprove from Your Side </strong>
        </body>
        </html>';
      \Mail::send([], [], function($email) use ($message,$subject)
      {
          $email->from('rbt@gmail.com','ivas_system');
          $email->to(ceo_email())->subject($subject);
          $email->setBody($message, 'text/html');
      });
    }
    /**
     * Method sendDepartmentEmail
     *
     * @param Contract $contract
     * @param String $item
     * @param array $emails
     *
     * @return void
     */
    public function sendDepartmentEmail($contract, $item, $emails)
    {
      $subject = "CEO Approve";
      $message  = '<!DOCTYPE html>
      <html lang="en">
          <head>
          </head>
          <body>
          <center> <strong>'. $contract->contract_code . ' ' . $contract->contract_label. '</strong> </center>
          </br>
          <center><strong> Ceo Approve This Contract That Contain Your Item</strong></center>
          '.$item.'
      </body>
      </html>';
      \Mail::send([], [], function($email) use ($message,$subject,$emails)
      {
          $email->from('rbt@gmail.com','ivas_system');
          $email->to($emails)->subject($subject);
          $email->setBody($message, 'text/html');
      });
    }
}
