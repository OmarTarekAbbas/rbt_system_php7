<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('contract_id');
            $table->string('year');
            $table->string('month');
            $table->tinyInteger('source_type')->comment('1- for operator , 2- for aggerator');
            $table->unsignedBigInteger('source_id');
            $table->integer('amount');
            $table->unsignedBigInteger('currency_id');
            $table->unsignedBigInteger('serivce_type_id');
            $table->tinyInteger('is_collected');
            $table->longText('notes')->nullable();
            $table->string('reports');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revenus');
    }
}
