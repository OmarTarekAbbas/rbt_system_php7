<?php

use App\ContractDuration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContractDurationData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      ContractDuration::insert([
        ['contract_duration_title' => '3 monthes'],
        ['contract_duration_title' => '6 monthes'],
        ['contract_duration_title' => '25 years']
      ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
