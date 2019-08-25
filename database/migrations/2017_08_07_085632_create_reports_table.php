<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {

            $table->increments('id');
            
            $table->integer('year');
            
            $table->string('month');
            
            $table->String('classification');
            
            $table->string('code');
            
            $table->string('rbt_name');
            
            $table->integer('download_no')->nullable();
            
            $table->integer('total_revenue');
            
            $table->integer('revenue_share');
            
            /**
             * Foreignkeys section
             */
            
            $table->integer('operator_id')->unsigned()->nullable();
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
            
            $table->integer('provider_id')->unsigned()->nullable();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');

            $table->integer('aggregator_id')->unsigned()->nullable();
            $table->foreign('aggregator_id')->references('id')->on('aggregators')->onDelete('cascade');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reports');
    }
}
