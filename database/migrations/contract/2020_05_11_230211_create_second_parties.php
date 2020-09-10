<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondParties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('second_parties', function (Blueprint $table) {
            $table->bigIncrements('second_party_id');
            $table->bigInteger('second_party_type_id')->unsigned();
            $table->foreign('second_party_type_id')->references('second_party_type_id')->on('second_party_types')->onUpdate('cascade')->onDelete('cascade');
           
            $table->string('second_party_title', 255);
            $table->date('second_party_joining_date')->default(date('Y-m-d'));
            $table->date('second_party_terminate_date')->nullable();
            $table->boolean('second_party_status')->default(1)->comment('1:working|0:terminated');

            $table->string('second_party_identity', 255)->nullable();
            $table->string('second_party_cr', 255)->nullable();
            $table->string('second_party_tc', 255)->nullable();
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
        Schema::dropIfExists('second_parties');
    }
}
