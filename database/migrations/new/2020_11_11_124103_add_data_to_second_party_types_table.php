<?php

use App\SecondParty;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataToSecondPartyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SecondParty::insert([
          ["second_party_type_title" =>  "Establishment", "second_party_type_description" => "Establishment"],
          ["second_party_type_title" =>  "Individual", "second_party_type_description" => "Individual"]
        ]);
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
