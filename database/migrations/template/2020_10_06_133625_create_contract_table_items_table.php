<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractTableItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contract_items', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->text('item');
			$table->unsignedBigInteger('department_id')->nullable()->index('department_id');
			$table->unsignedBigInteger('contract_id')->index('contract_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contract_items');
	}

}
