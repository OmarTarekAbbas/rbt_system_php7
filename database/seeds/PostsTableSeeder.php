<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'published_date' => '2019-03-06',
                'active' => 1,
                'url' => 'http://localhost/ivas_template_last/user/content/23?op_id=1&post_id=1',
                'content_id' => 23,
                'operator_id' => 1,
                'user_id' => 1,
                'created_at' => '2019-03-14 08:49:45',
                'updated_at' => '2019-03-14 08:49:45',
            ),
            1 => 
            array (
                'id' => 2,
                'published_date' => '2019-03-06',
                'active' => 1,
                'url' => 'http://localhost/ivas_template_last/user/content/23?op_id=4&post_id=2',
                'content_id' => 23,
                'operator_id' => 4,
                'user_id' => 1,
                'created_at' => '2019-03-14 08:49:45',
                'updated_at' => '2019-03-14 08:49:45',
            ),
        ));
        
        
    }
}
