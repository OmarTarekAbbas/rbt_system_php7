<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reports', function(Blueprint $table)
		{
			$table->foreign('aggregator_id')->references('id')->on('aggregators')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('operator_id')->references('id')->on('operators')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('provider_id')->references('id')->on('providers')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('rbt_id')->references('id')->on('rbts')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reports', function(Blueprint $table)
		{
			$table->dropForeign('reports_aggregator_id_foreign');
			$table->dropForeign('reports_operator_id_foreign');
			$table->dropForeign('reports_provider_id_foreign');
			$table->dropForeign('reports_rbt_id_foreign');
		});
	}

}
