<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('attachment_code', 60)->default('#');
            $table->bigInteger('contract_id')->unsigned();
            $table->tinyInteger('attachment_type')->comment('1:annex/2:authorization/3:copyright');
            $table->string('attachment_title', 200);
            $table->date('attachment_date');
            $table->date('attachment_expiry_date');
            $table->date('contract_expiry_date');
            $table->string('attachment_pdf', 255);
            $table->boolean('attachment_status')->comment('1:Active/0:Expired');
            $table->text('notes')->nullable();
            $table->integer('entry_by');
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
        Schema::dropIfExists('attachments');
    }
}
