<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRbtsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rbts', function(Blueprint $table)
		{
			$table->foreign('aggregator_id')->references('id')->on('aggregators')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('content_id')->references('id')->on('contents')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('occasion_id')->references('id')->on('occasions')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('operator_id')->references('id')->on('operators')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('provider_id')->references('id')->on('providers')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rbts', function(Blueprint $table)
		{
			$table->dropForeign('rbts_aggregator_id_foreign');
			$table->dropForeign('rbts_content_id_foreign');
			$table->dropForeign('rbts_occasion_id_foreign');
			$table->dropForeign('rbts_operator_id_foreign');
			$table->dropForeign('rbts_provider_id_foreign');
		});
	}

}
