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
}
