<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Countries.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:13:56am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Countries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('countries',function (Blueprint $table){

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
        Schema::drop('countries');
    }
}
