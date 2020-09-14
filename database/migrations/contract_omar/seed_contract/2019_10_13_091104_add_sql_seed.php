<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSqlSeed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("INSERT INTO `contract_duration` (`contract_duration_id`, `contract_duration_title`, `created_at`, `updated_at`) VALUES
        (1, '1 Year', NULL, NULL),
        (2, '2 Years', NULL, NULL),
        (3, '3 Years', NULL, NULL),
        (4, '5 Years', NULL, NULL),
        (5, '6 Months', NULL, NULL),
        (6, '1 Month', NULL, NULL),
        (7, '2 Months', NULL, NULL);");
        \DB::statement("INSERT INTO `contract_services` (`id`, `contract_id`, `title`, `created_at`, `updated_at`) VALUES
        (29, 4, 'mishri', '2020-09-10 09:23:54', '2020-09-10 09:23:54'),
        (30, 7, 'hamed', '2020-09-10 09:23:58', '2020-09-10 09:23:58');");
        \DB::statement("INSERT INTO `percentage` (`id`, `percentage`) VALUES
        (1, 5),
        (2, 10),
        (3, 15),
        (4, 20),
        (5, 25),
        (6, 30),
        (7, 35),
        (8, 40),
        (9, 45),
        (10, 50),
        (11, 55),
        (12, 60),
        (13, 65),
        (14, 70),
        (15, 75),
        (16, 80),
        (17, 85),
        (18, 90),
        (19, 95),
        (20, 0),
        (21, 28);");
        \DB::statement("INSERT INTO `first_parties` (`id`, `first_party_title`, `first_party_joining_date`, `created_at`, `updated_at`) VALUES
        (1, 'iVAS', '2013-01-01', NULL, NULL),
        (2, 'DigiZone', '2019-01-01', NULL, NULL),
        (3, 'Scene Production', '2016-01-01', NULL, NULL);");
        \DB::statement("INSERT INTO `service_types` (`id`, `service_type_title`, `created_at`, `updated_at`) VALUES
        (1, 'VAS (RBT - Alert - IVR - SMS - MMS)', NULL, NULL),
        (2, 'RBT', NULL, NULL),
        (3, 'Subscription (Alert) included video - audio - gif - jpg - fi', NULL, NULL),
        (4, 'SMS', NULL, NULL),
        (5, 'MMS', NULL, NULL),
        (6, 'IVR', NULL, NULL),
        (7, 'Social Media', NULL, NULL),
        (8, 'Website', NULL, NULL),
        (9, 'Web Application', NULL, NULL),
        (10, 'Mobile Application', NULL, NULL),
        (11, 'Maintenance', NULL, NULL),
        (12, 'Competition', NULL, NULL),
        (13, 'Streaming', NULL, NULL);");
        
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
