<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('role_route', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('role_id')->unsigned()->index('role_id_2');
        //     $table->integer('route_id')->unsigned()->index('route_id_2');
        //     $table->foreign('route_id', 'role_route_ibfk_1')->references('id')->on('routes')->onUpdate('CASCADE')->onDelete('CASCADE');
        //     $table->foreign('role_id', 'role_route_ibfk_2')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('CASCADE');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_route');
    }
}
