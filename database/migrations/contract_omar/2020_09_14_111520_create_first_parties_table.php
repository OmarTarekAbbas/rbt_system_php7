<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFirstPartiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('first_parties', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('first_party_title');
			$table->date('first_party_joining_date')->default('2020-09-10');
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
		Schema::drop('first_parties');
	}

}
