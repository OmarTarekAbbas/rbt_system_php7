<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRenewDurationIdToContractRenewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contract_renews', function (Blueprint $table) {
            $table->unsignedBigInteger('renew_duration_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contract_renews', function (Blueprint $table) {
          $table->dropColumn('renew_duration_id');
        });
    }
}
