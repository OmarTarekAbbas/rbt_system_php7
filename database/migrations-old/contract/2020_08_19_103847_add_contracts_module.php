<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContractsModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_module', function (Blueprint $table) {
            $table->bigIncrements('module_id');
            $table->string('module_name');
            $table->string('module_title');
            $table->text('module_note');
            $table->text('module_author');
            $table->text('module_created');
            $table->text('module_desc');
            $table->text('module_db');
            $table->text('module_db_key');
            $table->text('module_type');
            $table->text('module_config');
            $table->text('module_lang');
            $table->timestamp('created_at');
        });
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
