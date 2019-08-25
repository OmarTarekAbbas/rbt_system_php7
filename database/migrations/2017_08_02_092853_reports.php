<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Reports.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:28:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Reports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('reports',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('year');
        
        $table->integer('month');
        
        $table->String('partner');
        
        $table->integer('total');
        
        $table->integer('partner_percentage');
        
        $table->integer('sencod_part_percentage');
        
        $table->integer('partner_amount');
        
        $table->integer('second_part_amount');
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('currency_id')->unsigned()->nullable();
        $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
        
        $table->integer('type_id')->unsigned()->nullable();
        $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        
        
        $table->timestamps();
        
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('reports');
    }
}
