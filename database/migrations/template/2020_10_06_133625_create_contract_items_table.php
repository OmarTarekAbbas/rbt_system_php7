<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contract_template_items', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->unsignedBigInteger('template_id')->nullable()->index('contract_template_id');
			$table->text('item');
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
