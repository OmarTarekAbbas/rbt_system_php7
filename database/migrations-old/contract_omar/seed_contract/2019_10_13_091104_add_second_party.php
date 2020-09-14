<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSecondParty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         \DB::table('second_party_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'second_party_type_title' => 'Aggregator',
                'second_party_type_description' => 'set second party type information here!',
                'created_at' => '2020-05-11 22:58:55',
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'second_party_type_title' => 'Provider',
                'second_party_type_description' => 'set second party type information here!',
                'created_at' => '2020-05-11 22:59:17',
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'second_party_type_title' => 'Operator',
                'second_party_type_description' => 'set second party type information here!',
                'created_at' => '2020-05-14 03:34:57',
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'second_party_type_title' => 'Content Provider',
                'second_party_type_description' => 'set second party type information here!',
                'created_at' => '2020-05-14 03:35:21',
                'updated_at' => NULL,
            ),
        ));
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
