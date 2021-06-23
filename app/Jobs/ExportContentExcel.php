<?php

namespace App\Jobs;

use App\Http\Controllers\ContentController;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ExportContentExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $contentController = new ContentController;
      $path = $contentController->jobContentExcel();
      $this->sendMailToAdmin($path);
      \File::append(storage_path('logs') . '/' . basename(get_class($this)) . '.log', $path.PHP_EOL);
    }

    /**
     * Handle a job failure.
     *
     * @param \Throwable $exception
     *
     * @return void
     */
    public function failed(\Throwable $exception)
    {
      \File::append(storage_path('logs') . '/' . basename(get_class($this)) . '.log', $exception->getMessage().PHP_EOL);
    }

    public function sendMailToAdmin($path)
    {
      $message  = '<!DOCTYPE html>
        <html lang="en">
            <head>
            </head>
            <body>
            <center> <strong>Content Excel</strong> </center>
            </br>
            <strong> Kindly check this excel file from this <a href="'.$path.'"> Link </a> </strong>
        </body>
        </html>';
      \Mail::send([], [], function($email) use ($message)
      {
          $email->from('contract@gmail.com', 'rbt_system');
          $email->to(explode(',', setting("content_excel_mail")))->subject('Content Excel');
          $email->setBody($message, 'text/html');
      });
    }
}
