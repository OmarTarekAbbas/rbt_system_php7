<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Operators.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:14:57am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Operators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('operators',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('title');
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('country_id')->unsigned()->nullable();
        $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        
        
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
        Schema::drop('operators');
    }
}
