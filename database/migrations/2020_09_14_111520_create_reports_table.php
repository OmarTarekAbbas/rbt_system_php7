<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reports', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('year');
			$table->integer('month')->unsigned();
			$table->string('classification', 191);
			$table->string('code', 191);
			$table->string('rbt_name', 191);
			$table->integer('rbt_id')->unsigned()->nullable()->index('reports_rbt_id_foreign');
			$table->integer('download_no')->nullable();
			$table->decimal('total_revenue', 10);
			$table->decimal('revenue_share', 10);
			$table->integer('operator_id')->unsigned()->nullable()->index('reports_operator_id_foreign');
			$table->integer('provider_id')->unsigned()->nullable()->index('reports_provider_id_foreign');
			$table->integer('aggregator_id')->unsigned()->nullable()->index('reports_aggregator_id_foreign');
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
		Schema::drop('reports');
	}

}
