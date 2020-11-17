<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdvancedPaymentNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contract_requests', function (Blueprint $table) {
          $table->string('advance_payment')->nullable()->change();
          $table->string('advance_payment_type')->nullable()->change();
          $table->string('advance_payment_amount')->nullable()->change();
          $table->string('advance_payment_details')->nullable()->change();
          $table->string('advance_payment_method')->nullable()->change();
          $table->string('installment_period_details')->nullable()->change();
        });
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
