<?php

use App\Operator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertNewValuesToOperatorTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('operator', function (Blueprint $table) {
      Operator::insert(['title' => 'Asiacell - Iraq', 'country_id' => 18, 'view_excel' => 1, 'created_at' => now()]);
      Operator::insert(['title' => 'Mobile - Oman', 'country_id' => 14, 'view_excel' => 1, 'created_at' => now()]);
      Operator::insert(['title' => 'Ooredoo - Tunisia', 'country_id' => 5, 'view_excel' => 1, 'created_at' => now()]);
      Operator::insert(['title' => 'Orange - Moroco', 'country_id' => 6, 'view_excel' => 1, 'created_at' => now()]);
      Operator::insert(['title' => 'Lebara - ksa', 'country_id' => 3, 'view_excel' => 1, 'created_at' => now()]);
      Operator::insert(['title' => 'Ooredoo - Oman', 'country_id' => 14, 'view_excel' => 1, 'created_at' => now()]);
      Operator::insert(['title' => 'Stc - Kuw', 'country_id' => 2, 'view_excel' => 1, 'created_at' => now()]);
      Operator::insert(['title' => 'Zain - Bahrain', 'country_id' => 10, 'view_excel' => 1, 'created_at' => now()]);
      Operator::insert(['title' => 'Viva - Bahrain', 'country_id' => 10, 'view_excel' => 1, 'created_at' => now()]);
      Operator::insert(['title' => 'Ooredoo - Kuw', 'country_id' => 2, 'view_excel' => 1, 'created_at' => now()]);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('operator', function (Blueprint $table) {
      //
    });
  }
}
