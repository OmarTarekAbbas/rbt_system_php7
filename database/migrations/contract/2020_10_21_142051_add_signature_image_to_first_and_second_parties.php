<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSignatureImageToFirstAndSecondParties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('contracts', function (Blueprint $table) {
        $table->dropColumn('first_party_signature');
        $table->dropColumn('second_party_signature');
        $table->dropColumn('first_party_seal');
        $table->dropColumn('second_party_seal');
      });
      Schema::table('first_parties', function (Blueprint $table) {
        $table->string('first_party_signature')->nullable();
        $table->string('first_party_seal')->nullable();
      });
      Schema::table('second_parties', function (Blueprint $table) {
        $table->string('second_party_signature')->nullable();
        $table->string('second_party_seal')->nullable();
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
