<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRbtsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rbts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('track_title_en', 191);
			$table->string('track_title_ar', 191)->nullable();
			$table->string('artist_name_en', 191)->nullable();
			$table->string('artist_name_ar', 191)->nullable();
			$table->string('album_name', 191)->nullable();
			$table->string('code', 191);
			$table->string('social_media_code', 191)->nullable();
			$table->string('owner', 191)->nullable();
			$table->string('track_file', 191)->nullable();
			$table->integer('operator_id')->unsigned()->nullable()->index('rbts_operator_id_foreign');
			$table->integer('occasion_id')->unsigned()->nullable()->index('rbts_occasion_id_foreign');
			$table->integer('aggregator_id')->unsigned()->nullable()->index('rbts_aggregator_id_foreign');
			$table->boolean('type')->default(0)->comment('0=old excel , 1=new excel');
			$table->timestamps();
			$table->integer('provider_id')->unsigned()->nullable()->index('rbts_provider_id_foreign');
			$table->integer('content_id')->unsigned()->nullable()->index('rbts_content_id_foreign');
			$table->string('internal_coding', 191);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rbts');
	}

}
