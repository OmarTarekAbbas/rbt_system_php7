<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSecondParties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('second_parties')->insert(array (
            0 =>
            array (
                'second_party_id' => 30,
                'second_party_type_id' => 4,
                'second_party_title' => 'The Wedding House',
                'second_party_joining_date' => '2017-06-11',
                'second_party_terminate_date' => NULL,
                'second_party_status' => 0,
                'second_party_identity' => NULL,
                'second_party_cr' => NULL,
                'second_party_tc' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'entry_by' => NULL,
            ),
            1 =>
            array (
                'second_party_id' => 29,
                'second_party_type_id' => 2,
                'second_party_title' => 'Melody Company',
                'second_party_joining_date' => '2015-12-01',
                'second_party_terminate_date' => NULL,
                'second_party_status' => 1,
                'second_party_identity' => NULL,
                'second_party_cr' => NULL,
                'second_party_tc' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'entry_by' => NULL,
            ),
            2 =>
            array (
                'second_party_id' => 28,
                'second_party_type_id' => 2,
                'second_party_title' => 'Mashary Rashed Al Afasy',
                'second_party_joining_date' => '2014-09-01',
                'second_party_terminate_date' => NULL,
                'second_party_status' => 1,
                'second_party_identity' => NULL,
                'second_party_cr' => NULL,
                'second_party_tc' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'entry_by' => NULL,
            ),
            3 =>
            array (
                'second_party_id' => 27,
                'second_party_type_id' => 1,
                'second_party_title' => 'Life Connection',
                'second_party_joining_date' => '2020-05-28',
                'second_party_terminate_date' => NULL,
                'second_party_status' => 0,
                'second_party_identity' => NULL,
                'second_party_cr' => NULL,
                'second_party_tc' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'entry_by' => NULL,
            ),
            4 =>
            array (
                'second_party_id' => 26,
                'second_party_type_id' => 1,
                'second_party_title' => 'Qanawat',
                'second_party_joining_date' => '2015-12-01',
                'second_party_terminate_date' => NULL,
                'second_party_status' => 1,
                'second_party_identity' => NULL,
                'second_party_cr' => NULL,
                'second_party_tc' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'entry_by' => NULL,
            ),
            5 =>
            array (
                'second_party_id' => 25,
                'second_party_type_id' => 1,
                'second_party_title' => 'EcoVas',
                'second_party_joining_date' => '2014-05-01',
                'second_party_terminate_date' => NULL,
                'second_party_status' => 1,
                'second_party_identity' => NULL,
                'second_party_cr' => NULL,
                'second_party_tc' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'entry_by' => NULL,
            ),
            6 =>
            array (
                'second_party_id' => 24,
                'second_party_type_id' => 1,
                'second_party_title' => 'Smart Technology',
                'second_party_joining_date' => '2013-06-01',
                'second_party_terminate_date' => NULL,
                'second_party_status' => 1,
                'second_party_identity' => NULL,
                'second_party_cr' => NULL,
                'second_party_tc' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'entry_by' => NULL,
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
