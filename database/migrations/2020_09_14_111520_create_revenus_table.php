<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRevenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('revenus', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('contract_id')->unsigned();
			$table->string('year', 191);
			$table->string('month', 191);
			$table->boolean('source_type')->comment('1- for operator , 2- for aggerator');
			$table->bigInteger('source_id')->unsigned();
			$table->string('amount', 191);
			$table->bigInteger('currency_id')->unsigned();
			$table->bigInteger('serivce_type_id')->unsigned();
			$table->boolean('is_collected');
			$table->text('notes')->nullable();
			$table->string('reports', 191);
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
		Schema::drop('revenus');
	}

}
