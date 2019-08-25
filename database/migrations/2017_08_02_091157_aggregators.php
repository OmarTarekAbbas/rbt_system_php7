<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Aggregators.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:11:57am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Aggregators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('aggregators',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('title');
        
        /**
         * Foreignkeys section
         */
        
        
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
        Schema::drop('aggregators');
    }
}
