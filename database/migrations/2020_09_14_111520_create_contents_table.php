<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('content_title', 191);
			$table->string('content_type', 191);
			$table->text('path', 65535);
			$table->string('image_preview', 191)->nullable();
			$table->integer('internal_coding')->nullable();
			$table->integer('provider_id')->unsigned()->nullable()->index('contents_provider_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('contents_user_id_foreign');
			$table->integer('occasion_id')->unsigned()->nullable()->index('contents_occasion_id_foreign');
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
		Schema::drop('contents');
	}

}
