<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_module', function(Blueprint $table)
		{
			$table->bigInteger('module_id', true)->unsigned();
			$table->string('module_name', 191);
			$table->string('module_title', 191);
			$table->text('module_note', 65535);
			$table->text('module_author', 65535);
			$table->text('module_created', 65535);
			$table->text('module_desc', 65535);
			$table->text('module_db', 65535);
			$table->text('module_db_key', 65535);
			$table->text('module_type', 65535);
			$table->text('module_config', 65535);
			$table->text('module_lang', 65535);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_module');
	}

}
