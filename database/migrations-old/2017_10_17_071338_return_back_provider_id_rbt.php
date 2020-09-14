<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReturnBackProviderIdRbt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rbts',function (Blueprint $table){
            $table->integer('provider_id')->unsigned()->nullable() ;
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rbts',function (Blueprint $table){
            $table->dropForeign(['provider_id']) ;
            $table->dropColumn(['provider_id']) ;
        });
    }
}
