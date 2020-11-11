<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contract_type');
            $table->string('contract_content_type');
            $table->string('title');
            $table->string('company_party_type');
            $table->string('company_authorized_signatory_name');
            $table->string('company_authorized_signatory_position');
            $table->string('company_authorized_signatory_mobile');
            $table->string('company_authorized_signatory_email');
            $table->string('company_project_manager_name');
            $table->string('company_project_manager_position');
            $table->string('company_project_manager_mobile');
            $table->string('company_project_manager_email');
            $table->unsignedBigInteger('second_party_type_id')->comment('client type');
            $table->unsignedBigInteger('second_party_id')->comment('client name');
            $table->string('client_party_type');
            $table->string('client_id');
            $table->string('client_id_image');
            $table->string('client_tc_image');
            $table->string('client_cr_image');
            $table->string('client_address');
            $table->string('client_authorized_signatory_name');
            $table->string('client_authorized_signatory_position');
            $table->string('client_authorized_signatory_mobile');
            $table->string('client_authorized_signatory_email');
            $table->string('client_project_manager_name');
            $table->string('client_project_manager_position');
            $table->string('client_project_manager_mobile');
            $table->string('client_project_manager_email');
            $table->string('content_type');
            $table->string('content_storage');
            $table->string('tracks_count')->nullable();
            $table->string('clips_count')->nullable();
            $table->string('images_count')->nullable();
            $table->date('delivered_date');
            $table->string('receiver_name');
            $table->string('receiver_position');
            $table->string('receiver_mobile');
            $table->string('receiver_email');
            $table->string('advance_payment');
            $table->string('advance_payment_type');
            $table->string('advance_payment_amount');
            $table->string('advance_payment_details');
            $table->string('advance_payment_method');
            $table->text('installment_period_details');
            $table->string('first_party_percentage')->nullable();
            $table->string('second_party_percentage')->nullable();
            $table->string('third_party_percentage')->nullable();
            $table->string('fourth_party_percentage')->nullable();
            $table->string('legal_officer_name');
            $table->string('legal_officer_position');
            $table->string('legal_officer_mobile');
            $table->string('legal_officer_email');
            $table->text('objective');
            $table->string('country_title');
            $table->string('operator_title');
            $table->unsignedBigInteger('service_type_id');
            $table->unsignedBigInteger('first_party_id');
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
        Schema::dropIfExists('contract_requests');
    }
}
