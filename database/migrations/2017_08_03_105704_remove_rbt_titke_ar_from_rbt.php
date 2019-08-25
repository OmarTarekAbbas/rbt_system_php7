<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveRbtTitkeArFromRbt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rbts', function($table) {
            $table->dropColumn(['track_title_ar']);
             $table->string('social_media_code')->nullable()->change();
             $table->string('owner')->nullable()->change();
             $table->string('track_file')->nullable()->change();
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
