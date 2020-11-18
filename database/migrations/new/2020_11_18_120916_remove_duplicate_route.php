<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveDuplicateRoute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // \DB::statement("DELETE FROM `role_route` WHERE `role_route`.`route_id` = 78;DELETE FROM `role_route` WHERE `role_route`.`route_id` = 79;DELETE FROM `routes` WHERE `routes`.`id` = 78;DELETE FROM `routes` WHERE `routes`.`id` = 79;SET FOREIGN_KEY_CHECKS = 1;");
        // \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
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
