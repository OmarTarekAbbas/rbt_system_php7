<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoadmapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roadmaps', function (Blueprint $table) {
            $table->increments('id');

            // general info
            $table->string('event_title', 150)->default('set event name');
            $table->string('event_color');
            $table->string('event_code');
            $table->date('event_start_date')->nullable();
            $table->date('event_end_date')->nullable();
            $table->boolean('event_status')->default(0)->comment('0:working / 1:complete');


            // occasions
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('occasion_id')->unsigned();
            $table->foreign('occasion_id')->references('id')->on('occasions')->onDelete('cascade');


            // Aggregator
            $table->integer('aggregator_id')->unsigned();
            $table->foreign('aggregator_id')->references('id')->on('aggregators')->onDelete('cascade');

            //Operators
            $table->integer('operator_id')->unsigned();
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');

            // support
            $table->text('aggregator_support')->nullable();
            $table->text('operator_support')->nullable();
            $table->text('promotion_support')->nullable();

            $table->integer('entry_by');
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
        Schema::dropIfExists('roadmap_events');
    }
}
