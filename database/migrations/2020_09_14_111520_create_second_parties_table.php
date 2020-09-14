<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecondPartiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('second_parties', function(Blueprint $table)
		{
			$table->bigInteger('second_party_id', true)->unsigned();
			$table->bigInteger('second_party_type_id')->unsigned()->index('second_parties_second_party_type_id_foreign');
			$table->string('second_party_title');
			$table->date('second_party_joining_date')->default('2020-05-28');
			$table->date('second_party_terminate_date')->nullable();
			$table->boolean('second_party_status')->default(1)->comment('1:working|0:terminated');
			$table->string('second_party_identity')->nullable();
			$table->string('second_party_cr')->nullable();
			$table->string('second_party_tc')->nullable();
			$table->timestamps();
			$table->integer('entry_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('second_parties');
	}

}
