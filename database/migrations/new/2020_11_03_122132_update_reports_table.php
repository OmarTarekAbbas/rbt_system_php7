<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('reports', function (Blueprint $table) {
        $table->dropForeign('reports_provider_id_foreign');
        $table->dropColumn('provider_id');
        $table->decimal('your_revenu',10)->after('revenue_share');
        $table->decimal('client_revenu',10)->after('your_revenu');
        $table->unsignedBigInteger('second_party_id')->after('client_revenu');
        $table->unsignedBigInteger('contract_id')->after('second_party_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('reports', function (Blueprint $table) {

      });
    }
}
