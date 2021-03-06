<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::statement("INSERT INTO `settings` (`key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES
      ('rbt_notify_date', '5', '2020-10-22 07:05:47', '2020-10-22 07:05:47', 2, NULL),
      ('content_notify_date', '5', '2020-10-22 07:06:01', '2020-10-22 07:06:01', 2, NULL),
      ( 'notifiy_rbt_emails', 'mohammed_hs55@yahoo.com,mh124404@gmail.com', '2020-10-22 08:23:53', '2020-10-22 08:32:53', 2, NULL),
      ( 'notifiy_content_emails', 'mohammed_hs55@yahoo.com,mh124404@gmail.com', '2020-10-22 08:24:27', '2020-10-22 08:32:57', 2, NULL),
      ('contract_notify_date', '5', '2020-10-22 07:06:01', '2020-10-22 07:06:01', 2, NULL),
      ( 'notifiy_contract_emails', 'mohammed_hs55@yahoo.com,mh124404@gmail.com', '2020-10-22 08:23:53', '2020-10-22 08:32:53', 2, NULL);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
}
