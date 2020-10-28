<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Contract;
use App\Notification;
use Carbon\Carbon;

class SendNotifyEmailBeforeContractEnd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:endcontract';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify setting emails that belong to contract before n days of contract end date ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $contracts = Contract::where('contract_expiry_date','>=',Carbon::now()->format('Y-m-d'))->where('contract_expiry_date','<=',Carbon::now()->addDays(setting('contract_notify_date'))->format('Y-m-d'))->get();
      foreach ($contracts as  $contract) {
        $subject = "Contract Expire Data Notifiy";
        $data['title'] = $contract->contract_code . ' ' . $contract->contract_label;
        $data['url']   = url('contracts/'.$contract->id.'/renew');
        $data['expire_date'] = $contract->expire_date;
        $this->sendEmail(explode(',',setting('notifiy_contract_emails')), $data, $subject);
        $this->sendNotifyToCeo($data);
      }
    }

    /**
     * Method sendEmail
     *
     * @param Array  $emails
     * @param Array  $data
     * @param String $subject
     *
     * @return void
     */
    public function sendEmail($emails, $data, $subject)
    {
      $message  = '<!DOCTYPE html>
        <html lang="en">
            <head>
            </head>
            <body>
            <center> <strong>'. $data['title'] .'</strong> </center>
            </br>
            <strong> Kindly check this '.$data['title'].' from this <a href="'.$data['url'].'"> Link </a> </br> Before Expire Date '.$data['expire_date'].' </strong>
        </body>
        </html>';
      \Mail::send([], [], function($email) use ($message,$subject,$emails)
      {
          $email->from('contract@gmail.com','ivas_system');
          $email->to($emails)->subject($subject);
          $email->setBody($message, 'text/html');
      });
    }

    /**
     * Method sendNotifyToCeo
     *
     * @param Array  $data
     *
     * @return void
     */
    public function sendNotifyToCeo($data)
    {
      $notification = new Notification();
      $notification->notifier_id = 1;
      $notification->notified_id = ceo_data()->id;
      $notification->subject = 'this contract with label and code ' . $data['title'] . ' Will Expire In '.$data['expire_date'] . ' and needed to renew';
      $notification->link = $data['url'];
      $notification->seen = 0;
      $notification->save();
    }
}
