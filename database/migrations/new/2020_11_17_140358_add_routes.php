<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoutes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $array = [
          array (
              'method' => 'get',
              'route' => 'contractrequests',
              'controller_name' => 'ContractRequestController',
              'function_name' => 'index',
              'route_name' => 'contract_request.index',
              'created_at' => '2020-11-04 14:40:11',
              'updated_at' => '2020-11-04 14:40:11',
          ),
          array (
              'method' => 'get',
              'route' => 'contractrequests/create',
              'controller_name' => 'ContractRequestController',
              'function_name' => 'create',
              'route_name' => 'contract_request.create',
              'created_at' => '2020-11-04 14:40:11',
              'updated_at' => '2020-11-04 14:40:11',
          ),
          array (
              'method' => 'post',
              'route' => 'contractrequests',
              'controller_name' => 'ContractRequestController',
              'function_name' => 'store',
              'route_name' => 'contract_request.store',
              'created_at' => '2020-11-04 14:40:11',
              'updated_at' => '2020-11-04 14:40:11',
          ),
          array (
              'method' => 'get',
              'route' => 'contractrequests/{contractrequests}',
              'controller_name' => 'ContractRequestController',
              'function_name' => 'show',
              'route_name' => 'contract_request.show',
              'created_at' => '2020-11-04 14:40:11',
              'updated_at' => '2020-11-04 14:40:11',
          ),
          array (
              'method' => 'get',
              'route' => 'contractrequests/{contractrequests}/edit',
              'controller_name' => 'ContractRequestController',
              'function_name' => 'edit',
              'route_name' => 'contract_request.edit',
              'created_at' => '2020-11-04 14:40:11',
              'updated_at' => '2020-11-04 14:40:11',
          ),
          array (
              'method' => 'put',
              'route' => 'contractrequests/{contractrequests}',
              'controller_name' => 'ContractRequestController',
              'function_name' => 'update',
              'route_name' => 'contract_request.update',
              'created_at' => '2020-11-04 14:40:12',
              'updated_at' => '2020-11-04 14:40:12',
          ),
          array (
              'method' => 'delete',
              'route' => 'contractrequests/{contractrequests}',
              'controller_name' => 'ContractRequestController',
              'function_name' => 'destroy',
              'route_name' => 'contract_request.destroy',
              'created_at' => '2020-11-04 14:40:12',
              'updated_at' => '2020-11-04 14:40:12',
          ),
          array (
              'method' => 'get',
              'route' => 'contractrequests/ajax/allData',
              'controller_name' => 'ContractRequestController',
              'function_name' => 'allData',
              'route_name' => 'contract_request.destroy',
              'created_at' => '2020-11-04 14:40:12',
              'updated_at' => '2020-11-04 14:40:12',
          ),
          array (
              'method' => 'delete',
              'route' => 'contractrequests/{contractrequests}',
              'controller_name' => 'ContractRequestController',
              'function_name' => 'destroy',
              'route_name' => 'contract_request.destroy',
              'created_at' => '2020-11-04 14:40:12',
              'updated_at' => '2020-11-04 14:40:12',
          ),
          array (
              'method' => 'delete',
              'route' => 'contractrequests/{contractrequests}',
              'controller_name' => 'ContractRequestController',
              'function_name' => 'destroy',
              'route_name' => 'contract_request.destroy',
              'created_at' => '2020-11-04 14:40:12',
              'updated_at' => '2020-11-04 14:40:12',
          )
        ];
        Route::create($array);
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
