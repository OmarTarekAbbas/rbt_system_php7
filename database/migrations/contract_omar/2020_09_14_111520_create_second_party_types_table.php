<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecondPartyTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('second_party_types', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('second_party_type_title', 191);
			$table->string('second_party_type_description', 200)->default('set second party type information here!');
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
		Schema::drop('second_party_types');
	}

}
