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
