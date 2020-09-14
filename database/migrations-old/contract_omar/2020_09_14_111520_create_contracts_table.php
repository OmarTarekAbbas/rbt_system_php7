<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contracts', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('contract_code', 60)->default('#CODE');
			$table->bigInteger('service_type_id')->unsigned()->index('service_type_id');
			$table->string('contract_label', 250)->default('set contract name');
			$table->bigInteger('first_party_id')->unsigned()->index('contracts_first_party_id_foreign');
			$table->boolean('first_party_select')->default(1)->comment('0:no | 1:yes');
			$table->bigInteger('second_party_id')->unsigned()->index('contracts_second_party_id_foreign');
			$table->string('first_party');
			$table->string('second_party');
			$table->boolean('first_party_percentage');
			$table->boolean('second_party_percentage');
			$table->date('contract_date')->default('2020-05-28');
			$table->bigInteger('contract_duration_id')->unsigned()->index('contracts_contract_duration_id_foreign');
			$table->boolean('renewal_status')->default(0)->comment('0:no | 1:yes | 2:renewal by another one');
			$table->boolean('contract_status')->default(1)->comment('0:terminated/1:active');
			$table->date('contract_expiry_date')->nullable();
			$table->string('country_title');
			$table->string('operator_title');
			$table->boolean('copies')->nullable()->default(2);
			$table->boolean('pages')->nullable()->default(10);
			$table->string('contract_pdf')->nullable();
			$table->text('contract_notes', 65535)->nullable();
			$table->string('btn_annex')->nullable();
			$table->string('btn_auturaisition')->nullable();
			$table->string('btn_copyrights')->nullable();
			$table->string('entry_by_details')->nullable();
			$table->integer('entry_by');
			$table->timestamps();
			$table->bigInteger('second_party_type_id')->unsigned()->nullable()->index('second_party_type_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contracts');
	}

}
