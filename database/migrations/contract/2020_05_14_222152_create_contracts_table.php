<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contract_code', 60)->default('#CODE');
            $table->string('contract_label', 250)->default('set contract name');
            $table->bigInteger('service_type_id')->unsigned();
            $table->foreign('service_type_id')->references('service_type_id')->on('service_types')->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('first_party_id')->unsigned();
            $table->foreign('first_party_id')->references('first_party_id')->on('first_parties')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('first_party_select')->default(1)->comment('0:no | 1:yes');
            $table->bigInteger('second_party_id')->unsigned();
            $table->foreign('second_party_id')->references('second_party_id')->on('second_parties')->onUpdate('cascade')->onDelete('cascade');

            $table->string('first_party');
            $table->string('second_party');
            $table->tinyInteger('first_party_percentage');
            $table->tinyInteger('second_party_percentage');

            $table->date('contract_date')->default(date('Y-m-d'));
            $table->bigInteger('contract_duration_id')->unsigned();
            $table->foreign('contract_duration_id')->references('contract_duration_id')->on('contract_duration')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('renewal_status')->default(0)->comment('0:no | 1:yes | 2:renewal by another one');
            $table->boolean('contract_status')->default(1)->comment('0:terminated/1:active');
            $table->date('contract_expiry_date')->nullable();


            $table->string('country_title');
            $table->string('operator_title');

            $table->tinyInteger('copies')->default(2)->nullable();
            $table->tinyInteger('pages')->default(10)->nullable();

            $table->string('contract_pdf');
            $table->text('contract_notes')->default('add any notes here!')->nullable();
            // buttons
            $table->string('btn_annex')->nullable();
            $table->string('btn_auturaisition')->nullable();
            $table->string('btn_copyrights')->nullable();

            $table->string('entry_by_details')->nullable();
            $table->integer('entry_by');
            $table->bigInteger('second_party_type_id')->unsigned();
            $table->foreign('second_party_type_id')->references('second_party_type_id')->on('second_party_types')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('contracts');
    }
}
