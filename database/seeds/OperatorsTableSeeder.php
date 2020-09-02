<?php

use Illuminate\Database\Seeder;

class OperatorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('operators')->delete();

        \DB::table('operators')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => 'etisalat',
                'country_id' => 1,
                'created_at' => '2019-02-11 13:12:35',
                'updated_at' => '2019-03-14 08:35:40',
            ),
            1 =>
            array (
                'id' => 4,
                'title' => 'Vodafone',
                'country_id' => 1,
                'created_at' => '2019-02-11 15:23:49',
                'updated_at' => '2019-03-14 08:33:53',
            ),
            2 =>
            array (
                'id' => 5,
                'title' => 'Orange',
                'country_id' => 1,
                'created_at' => '2019-03-14 08:36:10',
                'updated_at' => '2019-03-14 08:36:10',
            ),
        ));


    }
}
