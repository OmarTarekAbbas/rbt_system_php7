<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('routes', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('method', 16);
        //     $table->string('route', 128);
        //     $table->string('controller_name', 128);
        //     $table->string('function_name', 128);
        //     $table->string('route_name', 128)->nullable();
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
        Schema::dropIfExists('routes');
    }
}
