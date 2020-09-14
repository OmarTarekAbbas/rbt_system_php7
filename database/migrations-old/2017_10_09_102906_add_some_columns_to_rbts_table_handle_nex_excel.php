<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColumnsToRbtsTableHandleNexExcel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('rbts', function($table) {
            $table->string('track_title_ar')->nullable()->after('track_title_en');
            $table->string('artist_name_en')->nullable()->after('track_title_ar');
            $table->string('artist_name_ar')->nullable()->after('artist_name_en');
            $table->string('album_name')->nullable()->after('artist_name_ar');
            $table->string('content_owner')->nullable()->after('owner');
            $table->boolean('type')->after('aggregator_id')->default(0)->comment("0=old excel , 1=new excel");
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
        Schema::table('rbts', function($table) {
            $table->dropColumn(['track_title_ar','artist_name_en','artist_name_ar','album_name','content_owner','type']);
        });
    }
}
