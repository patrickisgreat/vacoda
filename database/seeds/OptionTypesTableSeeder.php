<?php

use Illuminate\Database\Seeder;

class OptionTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('option_types')->delete();
        
        \DB::table('option_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'creator_id' => 1,
                'team_id' => 3,
                'name' => 'departments',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'creator_id' => 1,
                'team_id' => 1,
                'name' => 'testType',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'creator_id' => 2,
                'team_id' => 4,
                'name' => 'Store',
                'created_at' => '2016-12-21 12:29:48',
                'updated_at' => '2016-12-21 12:29:48',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
