<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(UserHasRolesTableSeeder::class);
        // $this->call(PermissionsTableSeeder::class);
        // $this->call(UserHasPermissionsTableSeeder::class);
        // $this->call(RoleHasPermissionsTableSeeder::class);
        // $this->call(CountriesTableSeeder::class);
        // $this->call(OperatorsTableSeeder::class);
        // $this->call(OperatorsTableSeeder::class);
        //$this->call(TbModuleTableSeeder::class);
        // $this->call(TemplatesTableSeeder::class);
        // $this->call(TemplateItemsTableSeeder::class);
        $this->call(RoutesTableSeeder::class);
    }
}
