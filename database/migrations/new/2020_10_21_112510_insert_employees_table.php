<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      \DB::statement("ALTER TABLE `employees` ADD `birth_certificate` VARCHAR(255) NULL DEFAULT NULL AFTER `release_date`, ADD `graduation_certificate` VARCHAR(255) NULL DEFAULT NULL AFTER `birth_certificate`, ADD `army_certificate` VARCHAR(255) NULL DEFAULT NULL AFTER `graduation_certificate`, ADD `insurance_certificate` VARCHAR(255) NULL DEFAULT NULL AFTER `army_certificate`, ADD `fish_watashbih` VARCHAR(255) NULL DEFAULT NULL AFTER `insurance_certificate`;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
