<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewOccassionsToContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contents', function (Blueprint $table) {
          //create occassion_2
          $table->unsignedInteger('occasion_2_id')->after('occasion_id')->nullable();
          $table->index('occasion_2_id');
          $table->foreign('occasion_2_id')->references('id')->on('occasions')->onDelete('cascade');

          //create occassion_3
          $table->unsignedInteger('occasion_3_id')->after('occasion_2_id')->nullable();
          $table->index('occasion_3_id');
          $table->foreign('occasion_3_id')->references('id')->on('occasions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contents', function (Blueprint $table) {
          $table->dropForeign('occasion_2_id');
          $table->dropIndex('occasion_2_id');
          $table->dropColumn('occasion_2_id');

          $table->dropForeign('occasion_3_id');
          $table->dropIndex('occasion_3_id');
          $table->dropColumn('occasion_3_id');
        });
    }
}
