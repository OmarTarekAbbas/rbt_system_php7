<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLegalRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      \DB::statement("INSERT INTO `roles` (`id`, `name`, `role_priority`, `created_at`, `updated_at`) VALUES (NULL, 'legal', '0', '2020-10-25 11:34:01', '2020-10-25 11:34:01')");
      \DB::statement("UPDATE `roles` SET `name` = 'operation' WHERE `roles`.`name` = 'admin'");
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
