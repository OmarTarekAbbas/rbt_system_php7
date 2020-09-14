<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractDurationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contract_duration', function(Blueprint $table)
		{
			$table->bigInteger('contract_duration_id', true)->unsigned();
			$table->string('contract_duration_title', 100)->default('add a duration');
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
		Schema::drop('contract_duration');
	}

}
