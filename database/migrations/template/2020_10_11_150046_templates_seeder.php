<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TemplatesSeeder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      \DB::table('templates')->insert(array (
          0 =>
          array (
              'id' => 1,
              'title' => 'عقد استغلال مصنفات فنية',
              'content_type' => 1,
              'created_at' => '2018-11-12 08:07:11',
              'updated_at' => '2019-03-27 13:07:13',
          ),
          1 =>
          array (
              'id' => 2,
              'title' => 'عقد استغلال محتوي لتقديم خدمات القيمة المضافة ',
              'content_type' => 2,
              'created_at' => '2018-10-25 09:36:19',
              'updated_at' => '2019-03-27 13:07:22',
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
