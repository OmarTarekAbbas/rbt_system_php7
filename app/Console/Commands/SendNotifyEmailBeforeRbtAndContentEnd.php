<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Rbt;
use App\Content;
use Carbon\Carbon;

class SendNotifyEmailBeforeRbtAndContentEnd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:endrbtcontent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify setting emails that belong to rbt and content before 5 days of rbt and content end date ';

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
      $rbts = Rbt::where('expire_date','=',Carbon::now()->addDays(setting('rbt_notify_date'))->format('Y-m-d'))->get();
      $contents = Content::where('expire_date','=',Carbon::now()->addDays(setting('content_notify_date'))->format('Y-m-d'))->get();
      foreach ($rbts as  $rbt) {
        $subject = "Rbt Expire Data Notify";
        $data['title'] = 'Rbt '.$rbt->track_title_en;
        $data['url']   = url('rbt/'.$rbt->id);
        $data['expire_date'] = $rbt->expire_date->format('Y-m-d');
        $this->sendEmail(explode(',',setting('notifiy_rbt_emails')), $data, $subject);
      }
      foreach ($contents as  $content) {
        $subject = "Content Expire Data Notifiy";
        $data['title'] = 'Content '.$content->content_title;
        $data['url']    = url('content/'.$content->id);
        $data['expire_date'] = $content->expire_date->format('Y-m-d');
        $this->sendEmail(explode(',',setting('notifiy_content_emails')), $data, $subject);
      }
      echo "contents and rbts notify Done" ;
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
          $email->from('rbt@gmail.com','ivas_system');
          $email->to($emails)->subject($subject);
          $email->setBody($message, 'text/html');
      });
    }
}
