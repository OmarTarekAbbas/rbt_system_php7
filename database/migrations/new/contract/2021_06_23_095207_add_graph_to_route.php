<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGraphToRoute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $route = \App\Route::create([
        "method" => 'get',
        "route" => 'rbts/graph',
        "controller_name" => 'RbtController',
        "function_name" => 'rbtGraph',
      ]);
      $route->roles()->attach(1);
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
