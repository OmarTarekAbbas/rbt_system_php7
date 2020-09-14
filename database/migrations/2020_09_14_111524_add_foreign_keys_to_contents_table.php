<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contents', function(Blueprint $table)
		{
			$table->foreign('occasion_id')->references('id')->on('occasions')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('provider_id')->references('id')->on('providers')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contents', function(Blueprint $table)
		{
			$table->dropForeign('contents_occasion_id_foreign');
			$table->dropForeign('contents_provider_id_foreign');
			$table->dropForeign('contents_user_id_foreign');
		});
	}

}
