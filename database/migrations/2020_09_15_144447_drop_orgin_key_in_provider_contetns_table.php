<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropOrginKeyInProviderContetnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::table('provider_contents', function (Blueprint $table) {
            $table->dropForeign(['roadmap_id']);
            $table->dropForeign(['provider_id']);
            $table->dropForeign(['content_id']);
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provider_contents', function (Blueprint $table) {
            //
        });
    }
}
