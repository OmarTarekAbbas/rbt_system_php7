<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertRoadmapActionToSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::statement("INSERT INTO `settings` (`key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES
      ( 'action_roadmap_emails', 'yousef.ashraf@ivas.com.eg,yousefegy94@gmail.com', '2020-10-22 08:23:53', '2020-10-22 08:32:53', 2, NULL)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
