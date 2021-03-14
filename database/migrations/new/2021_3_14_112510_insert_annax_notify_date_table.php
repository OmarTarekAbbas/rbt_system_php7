<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertAnnaxNotifyDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      \DB::statement("INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES (NULL, 'attachment_notify_date', '30', '2020-10-22 13:06:01', '2020-11-15 21:45:53', '2', NULL)");
      \DB::statement("INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES (NULL, 'attachment_notify_emails', 'emad@ivas.com.eg', '2020-10-22 14:24:27', '2020-11-16 14:52:56', '2', NULL)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
