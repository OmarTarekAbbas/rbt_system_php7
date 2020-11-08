<?php

use Illuminate\Database\Seeder;

class DepartmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('departments')->delete();

      \DB::table('departments')->insert(
        [
          'title' => 'RBT',
          'email' => 'Operations@ivas.com.eg',
          'manager_id' => 1
        ],
        [
          'title' => 'Subscriptions',
          'email' => 'subscriptions@gmail.com',
          'manager_id' => 1
        ],
        [
          'title' => 'Digital Media',
          'email' => 'Operations@ivas.com.eg',
          'manager_id' => 1
        ],
        [
          'title' => 'Social Media',
          'email' => 'Operations@ivas.com.eg',
          'manager_id' => 1
        ],
        [
          'title' => 'Multimedia',
          'email' => 'multimedia@ivas.com.eg',
          'manager_id' => 1
        ],
        [
          'title' => 'Development',
          'email' => 'Development@ivas.com.eg',
          'manager_id' => 1
        ],
        [
          'title' => 'IT',
          'email' => 'IT@ivas.com.eg',
          'manager_id' => 1
        ],
        [
          'title' => 'Legal',
          'email' => 'legal@ivas.com.eg',
          'manager_id' => 1
        ],
        [
          'title' => 'CEO Assistant',
          'email' => 'ceo_assistant@ivas.com.eg',
          'manager_id' => 1
        ]
      );
    }
}
