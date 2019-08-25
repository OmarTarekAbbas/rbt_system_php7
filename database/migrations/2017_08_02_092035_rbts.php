<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Rbts.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:20:35am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Rbts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('rbts',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('track_title_en');
        
        $table->String('track_title_ar');
        
        $table->String('code');
        
        $table->String('social_media_code');
        
        $table->String('owner');
        
        $table->String('track_file');
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('provider_id')->unsigned()->nullable();
        $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
        
        $table->integer('operator_id')->unsigned()->nullable();
        $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
        
        $table->integer('occasion_id')->unsigned()->nullable();
        $table->foreign('occasion_id')->references('id')->on('occasions')->onDelete('cascade');
        
        $table->integer('aggregator_id')->unsigned()->nullable();
        $table->foreign('aggregator_id')->references('id')->on('aggregators')->onDelete('cascade');
        
        
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
        Schema::drop('rbts');
    }
}
