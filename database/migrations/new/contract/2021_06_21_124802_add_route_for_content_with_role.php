<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRouteForContentWithRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $routes = [
          ["method" => "get","route" => "contents/allExpireContent","controller_name" => "ContentController","function_name" => "allExpireContent"],
          ["method" => "get","route" => "expire_content","controller_name" => "ContentController","function_name" => "getExpireContent"],
          ["method" => "get","route" => "contents/allNextCommingExpireContent","controller_name" => "ContentController","function_name" => "allNextCommingExpireContent"],
          ["method" => "get","route" => "new_comming_expire_content","controller_name" => "ContentController","function_name" => "getNextCommingExpireContent"]
        ];
        foreach ($routes as  $route) {
          $route = \App\Route::create([
            "method" => $route['method'],
            "route" => $route['route'],
            "controller_name" => $route['controller_name'],
            "function_name" => $route['function_name'],
          ]);
          $route->roles()->attach(1);
        }
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
