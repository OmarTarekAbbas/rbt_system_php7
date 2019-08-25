<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditReportsTableModifyTotalAndShareRevenueBySql extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('reports', function(Blueprint $table){
            $sql = 'ALTER TABLE `reports` CHANGE `total_revenue` `total_revenue` DECIMAL(10,2) NOT NULL  ; ALTER TABLE `reports` CHANGE `revenue_share` `revenue_share` DECIMAL(10,2) NOT NULL';
            DB::connection()->getPdo()->exec($sql);
        });

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
