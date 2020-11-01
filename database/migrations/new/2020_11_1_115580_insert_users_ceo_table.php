<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Role;

class InsertUsersCeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $password = '$2y$10$u2evAW530miwgUb2jcXkTuqIGswxnSQ3DSmX1Ji5rtO3Tx.MtVcX2';
      $user = User:: create([
        'name' => 'Ceo',
        'email' => 'ceo125@gmail.com',
        'password' => $password,
      ]);
      $role = Role::create([
        'name' => 'ceo',
        'role_priority' => '0',
      ]);
      $user->assignRole($role);

      // // \DB::statement("INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_img`, `aggregator_id`) VALUES ('20', 'Ceo', 'ceo125@gmail.com', '$password', NULL, '2020-10-15 08:09:19', '2020-10-15 08:09:19', '', NULL)");
      // \DB::statement("INSERT INTO `roles` (`id`, `name`, `role_priority`, `created_at`, `updated_at`) VALUES ('20', 'ceo', '0', '2020-11-01 14:40:19', '2020-11-01 14:40:19')");
      // \DB::statement("INSERT INTO `user_has_roles` (`role_id`, `user_id`) VALUES ('20', '20')");
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
