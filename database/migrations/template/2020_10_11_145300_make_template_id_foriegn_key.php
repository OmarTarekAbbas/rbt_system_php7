<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeTemplateIdForiegnKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::statement('ALTER TABLE `template_items` ADD CONSTRAINT `template_id` FOREIGN KEY (`template_id`) REFERENCES `templates`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;');
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
