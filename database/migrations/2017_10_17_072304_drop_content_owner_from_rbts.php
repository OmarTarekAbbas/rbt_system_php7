<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropContentOwnerFromRbts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rbts',function (Blueprint $table){
            $table->dropColumn(['content_owner']) ;
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
            $table->string('content_owner')->nullable() ;
        });
    }
}
