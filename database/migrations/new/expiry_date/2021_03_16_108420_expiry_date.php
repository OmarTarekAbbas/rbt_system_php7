<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExpiryDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      \DB::statement("INSERT INTO `routes` (`id`, `method`, `route`, `controller_name`, `function_name`, `route_name`, `created_at`, `updated_at`) VALUES (NULL, 'get', 'fullcontracts_expiry_date', 'FullcontractsController', 'fullcontracts_expiry_date_index', '', '2020-11-04 19:40:05', '2020-11-04 19:40:05')");

      \DB::statement("INSERT INTO `routes` (`id`, `method`, `route`, `controller_name`, `function_name`, `route_name`, `created_at`, `updated_at`) VALUES (NULL, 'get', 'contracts/fullcontracts_expiry_date', 'FullcontractsController', 'fullcontracts_expiry_date', '', '2020-11-04 19:40:05', '2020-11-04 19:40:05')");

      \DB::statement("INSERT INTO `routes` (`id`, `method`, `route`, `controller_name`, `function_name`, `route_name`, `created_at`, `updated_at`) VALUES (NULL, 'get', 'attachment_expiry_date', 'AttachmentController', 'attachment_expiry_date_index', '', '2020-11-04 19:40:05', '2020-11-04 19:40:05')");

      \DB::statement("INSERT INTO `routes` (`id`, `method`, `route`, `controller_name`, `function_name`, `route_name`, `created_at`, `updated_at`) VALUES (NULL, 'get', 'attachment_all/attachment_expiry_date', 'AttachmentController', 'attachment_expiry_date', '', '2020-11-04 19:40:05', '2020-11-04 19:40:05')");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
