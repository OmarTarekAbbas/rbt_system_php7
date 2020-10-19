<?php

namespace App\Observers;

use App\Contract;
use App\Notification;

class ContractObserver
{
    /**
     * Method saved
     * function work after save contract
     * @return void
     */
    public function saved(Contract $contract)
    {
      if ($contract->full_approves && !$contract->ceo_approve) {
        $url = url('ceo/' . $contract->id . '/approve');
        $this->sendNotifocation($contract, $url);
        $this->sendEmail($contract, $url);
      }
    }

    /**
     * Method sendNotifocation
     *
     * @param Contract $contract
     * @param String $url
     * @return void
     */
    public function sendNotifocation($contract, $url)
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
     * Method sendEmail
     *
     * @param Contract $contract
     * @param String $url
     *
     * @return void
     */
    public function sendEmail($contract, $url)
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
          $email->to(ceo_email)->subject($subject);
          $email->setBody($message, 'text/html');
      });
    }
}
