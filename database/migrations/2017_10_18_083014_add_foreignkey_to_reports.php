<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyToReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports',function (Blueprint $table){
            $table->integer('rbt_id')->unsigned()->change();
            $table->foreign('rbt_id')->references('id')->on('rbts')->onDelete('cascade') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports',function (Blueprint $table){
            $table->dropForeign(['rbt_id']);
        });
    }
}
