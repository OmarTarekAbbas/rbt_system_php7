<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('contents', function (Blueprint $table) {
        $table->foreign('provider_id')->references('second_party_id')->on('second_parties');
        // ALTER TABLE `contents` ADD CONSTRAINT `contents_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `second_parties`(`second_party_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
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
