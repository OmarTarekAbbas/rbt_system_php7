<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\SecondParty;

class AddNewTypeToSecondPartyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('second_party_types', function (Blueprint $table) {
          SecondParty::insert([
            'second_party_type_title' => 'artist',
            'created_at' => now(),
          ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('second_party_types', function (Blueprint $table) {
            //
        });
    }
}
