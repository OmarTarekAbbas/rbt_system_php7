<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractRenewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_renews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('contract_id');
            $table->date('renew_start_date');
            $table->date('renew_expire_date');
            $table->tinyInteger('ceo_renew')->default(0)->comment('0- no action | 1- renew | 2- not renew');
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
        Schema::dropIfExists('contract_renews');
    }
}
