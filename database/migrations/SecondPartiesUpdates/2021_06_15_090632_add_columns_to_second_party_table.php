<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToSecondPartyTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('second_parties', function (Blueprint $table) {
      $table->string('second_party_title_ar')->nullable()->after('second_party_title');
      $table->string('gender')->nullable()->after('second_party_title_ar');
      $table->string('artist_code')->nullable()->after('gender');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('second_parties', function (Blueprint $table) {
      //
    });
  }
}
