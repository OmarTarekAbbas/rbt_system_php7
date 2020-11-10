<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertRouteAttachment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      \DB::statement("INSERT INTO `routes` (`id`, `method`, `route`, `controller_name`, `function_name`, `route_name`, `created_at`, `updated_at`) VALUES (NULL, 'get', 'attachment_all/allData', 'AttachmentController', 'allData', '', '2020-11-04 14:40:11', '2020-11-04 14:40:11')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
