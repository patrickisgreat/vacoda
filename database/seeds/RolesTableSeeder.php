<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 39,
                'team_id' => 1,
                'name' => 'Reviewer',
                'label' => 'reviewer',
                'created_at' => '2016-11-16 00:05:07',
                'updated_at' => '2016-11-16 00:05:07',
            ),
            1 => 
            array (
                'id' => 40,
                'team_id' => 1,
                'name' => 'Creator',
                'label' => 'creator',
                'created_at' => '2016-11-16 00:05:07',
                'updated_at' => '2016-11-16 00:05:07',
            ),
            2 => 
            array (
                'id' => 41,
                'team_id' => 1,
                'name' => 'Viewer',
                'label' => 'viewer',
                'created_at' => '2016-11-16 00:05:07',
                'updated_at' => '2016-11-16 00:05:07',
            ),
            3 => 
            array (
                'id' => 42,
                'team_id' => 1,
                'name' => 'Company Admin',
                'label' => 'company_administrator',
                'created_at' => '2016-11-16 00:05:07',
                'updated_at' => '2016-11-16 00:05:07',
            ),
            4 => 
            array (
                'id' => 43,
                'team_id' => 1,
                'name' => 'Super Admin',
                'label' => 'super_admin',
                'created_at' => '2016-11-16 00:05:07',
                'updated_at' => '2016-11-16 00:05:07',
            ),
            5 => 
            array (
                'id' => 44,
                'team_id' => 3,
                'name' => 'Reviewer',
                'label' => 'reviewer',
                'created_at' => '2016-11-16 00:28:06',
                'updated_at' => '2016-11-16 00:28:06',
            ),
            6 => 
            array (
                'id' => 45,
                'team_id' => 3,
                'name' => 'Creator',
                'label' => 'creator',
                'created_at' => '2016-11-16 00:28:06',
                'updated_at' => '2016-11-16 00:28:06',
            ),
            7 => 
            array (
                'id' => 46,
                'team_id' => 3,
                'name' => 'Viewer',
                'label' => 'viewer',
                'created_at' => '2016-11-16 00:28:06',
                'updated_at' => '2016-11-16 00:28:06',
            ),
            8 => 
            array (
                'id' => 47,
                'team_id' => 3,
                'name' => 'Company Admin',
                'label' => 'company_administrator',
                'created_at' => '2016-11-16 00:28:06',
                'updated_at' => '2016-11-16 00:38:26',
            ),
            9 => 
            array (
                'id' => 48,
                'team_id' => 4,
                'name' => 'Reviewer',
                'label' => 'reviewer',
                'created_at' => '2016-12-21 00:28:06',
                'updated_at' => '2016-12-21 00:28:06',
            ),
            10 => 
            array (
                'id' => 49,
                'team_id' => 4,
                'name' => 'Creator',
                'label' => 'creator',
                'created_at' => '2016-12-21 00:28:06',
                'updated_at' => '2016-12-21 00:28:06',
            ),
            11 => 
            array (
                'id' => 50,
                'team_id' => 4,
                'name' => 'Viewer',
                'label' => 'viewer',
                'created_at' => '2016-12-21 00:28:06',
                'updated_at' => '2016-12-21 00:28:06',
            ),
            12 => 
            array (
                'id' => 51,
                'team_id' => 4,
                'name' => 'Company Admin',
                'label' => 'company_administrator',
                'created_at' => '2016-12-21 00:28:06',
                'updated_at' => '2016-12-21 00:38:26',
            ),
        ));
        
        
    }
}
