<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnContractItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contract_items', function (Blueprint $table) {
            $table->integer('fullapproves')->default("0")->comment('1-allApproved 0-notApproved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contract_items', function (Blueprint $table) {
            $table->removeColumn('fullapproves');
        });
    }
}
