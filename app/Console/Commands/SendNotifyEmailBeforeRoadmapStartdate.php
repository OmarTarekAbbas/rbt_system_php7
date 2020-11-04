<?php

namespace App\Console\Commands;

use App\Roadmap;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNotifyEmailBeforeRoadmapStartdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:roadmapstartdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify setting emails that belong to roadmap before n days of roadmap start date';

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
        $today_date = Carbon::now()->format('Y-m-d');
        $today_date_addDays_setting = Carbon::now()->addDays(setting('roadmap_notify_date'))->format('Y-m-d');


        $roadmaps = Roadmap::where('event_start_date', '>=', $today_date)
            ->where('event_start_date', '<=', $today_date_addDays_setting)
            ->where('notify', 1)
            ->get();

        foreach ($roadmaps as $roadmap) {

            $subject = "Roadmap Start Date Notifiy";

            $data['title'] = $roadmap->event_title;
            $data['url'] = APP_URL."/roadmap/$roadmap->id";
            $data['start_date'] = $roadmap->event_start_date->format('Y-m-d');

            $emails = explode(',', setting('notify_roadmap_emails'));

            $this->sendEmail($emails, $data, $subject);

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
        $message = '<!DOCTYPE html>
        <html lang="en">
            <head>
            </head>
            <body>
            <center> <strong>' . $data['title'] . '</strong> </center>
            </br>
            <strong> Kindly check this ' . $data['title'] . ' from this <a href="' . $data['url'] . '"> Link </a> </br> This Event Start Date is ' . $data['start_date'] . ' </strong>
        </body>
        </html>';
        Mail::send([], [], function ($email) use ($message, $subject, $emails) {
            $email->from('contract@gmail.com', 'Ivas System');
            $email->to($emails)->subject($subject);
            $email->setBody($message, 'text/html');
        });
    }

}
