<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondPartyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('second_party_types', function (Blueprint $table) {
            $table->bigIncrements('second_party_type_id');
            $table->string('second_party_type_title');
            $table->string('second_party_type_description', 200)->default('set second party type information here!');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('second_party_types');
    }
}
