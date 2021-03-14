<?php

namespace App\Console\Commands;

use App\Attachment;
use Illuminate\Console\Command;
use App\Notification;
use Carbon\Carbon;
class SendNotifyEmailBeforeAttachmentsStartdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:attachments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify setting emails that belong to attachments before n days of attachments end date';

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
      $attachments = Attachment::where('attachment_expiry_date','>=',Carbon::now()->format('Y-m-d'))
      ->where('attachment_expiry_date','<=',Carbon::now()->addDays(setting('attachment_notify_date'))->format('Y-m-d'))->get();
      foreach ($attachments as  $attachment) {
        $subject = "Attachment Expire Data Notify";
        $data['title'] = $attachment->attachment_code . ' ' . $attachment->attachment_title.' Type: '.$attachment->attachment_type;
        $data['url']   = url('attachment/'.$attachment->id.'/edit');
        $data['expire_date'] = $attachment->attachment_expiry_date;
        $this->sendEmail(explode(',',setting('attachment_notify_emails')), $data, $subject);
        // $this->sendNotifyToCeo($data);
      }
    }

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
