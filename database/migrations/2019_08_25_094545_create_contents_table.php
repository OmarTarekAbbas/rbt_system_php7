<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content_title');
            $table->string('content_type');
            $table->text('path');
            $table->string('image_preview')->nullable();
            $table->integer('internal_coding')->nullable();
            $table->integer('provider_id')->unsigned()->nullable();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('occasion_id')->unsigned()->nullable();
            $table->foreign('occasion_id')->references('id')->on('occasions')->onDelete('cascade');
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
        Schema::dropIfExists('contents');
    }
}
