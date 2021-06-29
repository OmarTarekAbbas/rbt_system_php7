<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRouteForContractAndContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $routes = [
        ["method" => "get", "route" => "active_content", "controller_name" => "ContentController", "function_name" => "activeContent"],
        ["method" => "get", "route" => "all_active_content", "controller_name" => "ContentController", "function_name" => "allActiveContent"],
        ["method" => "get", "route" => "active_contract", "controller_name" => "FullcontractsController", "function_name" => "activeContract"],
        ["method" => "get", "route" => "all_active_contract", "controller_name" => "FullcontractsController", "function_name" => "allActiveContract"],
        ["method" => "get", "route" => "contract_will_expire", "controller_name" => "FullcontractsController", "function_name" => "contractWillExpire"],
        ["method" => "get", "route" => "all_contract_will_expire", "controller_name" => "FullcontractsController", "function_name" => "allContractWillExpire"],
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
