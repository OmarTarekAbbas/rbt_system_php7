<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContentIdFkToRbts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rbts', function (Blueprint $table) {
            $table->integer('content_id')->unsigned()->nullable();
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rbts', function (Blueprint $table) {
            $table->dropForeign('content_id');
        });
    }
}
