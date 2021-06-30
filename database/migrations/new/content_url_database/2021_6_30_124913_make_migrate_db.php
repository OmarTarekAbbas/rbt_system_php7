<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeMigrateDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::statement("INSERT INTO `routes` (`id`, `method`, `route`, `controller_name`, `function_name`, `route_name`, `created_at`, `updated_at`) VALUES (NULL, 'get', 'create_content_excel', 'ContentController', 'getCreateContentExcel', NULL, NULL, NULL), (NULL, 'get', 'content_excel_download_sample', 'ContentController', 'contentExcelDownloadSample', NULL, NULL, NULL), (NULL, 'post', 'store_content_excel', 'ContentController', 'storeContentExcel', NULL, NULL, NULL), (NULL, 'get', 'export_content_excel', 'ContentController', 'exportContentExcel', NULL, NULL, NULL), (NULL, 'post', 'download_content_excel', 'ContentController', 'downloadContentExcel', NULL, NULL, NULL), (NULL, 'get', 'job_export_content_excel', 'ContentController', 'getJobDownloadContentExcel', NULL, NULL, NULL), (NULL, 'post', 'job_download_content_excel', 'ContentController', 'jobDownloadContentExcel', NULL, NULL, NULL), (NULL, 'post', 'start_job', 'ContentController', 'startJob', NULL, NULL, NULL), (NULL, 'post', 'stop_job', 'ContentController', 'stopJob', NULL, NULL, NULL)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
