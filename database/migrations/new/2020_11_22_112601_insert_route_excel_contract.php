<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertRouteExcelContract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      \DB::statement("INSERT INTO `routes` (`id`, `method`, `route`, `controller_name`, `function_name`, `route_name`, `created_at`, `updated_at`) VALUES (NULL, 'get', 'contract/export/excel', 'FullcontractsController', 'export_excel', NULL, '2020-11-22 15:21:13', '2020-11-22 15:21:13')");
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
