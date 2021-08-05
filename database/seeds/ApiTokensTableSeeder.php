<?php

use Illuminate\Database\Seeder;

class ApiTokensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('api_tokens')->delete();
        
        \DB::table('api_tokens')->insert(array (
            0 => 
            array (
                'id' => '703c4317-9107-4cfb-9f3c-23918e18f460',
                'user_id' => 2,
                'name' => 'screenshot-dev',
                'token' => 'xUdT2cqR38YWZB1qToP8qTqPWtK3AyEs3A7zYRJsYFFPlTVofAWhPmPmonh7',
                'metadata' => '[]',
                'transient' => 0,
                'last_used_at' => '2017-01-10 04:02:22',
                'expires_at' => NULL,
                'created_at' => '2017-01-10 04:00:53',
                'updated_at' => '2017-01-10 04:02:22',
            ),
            1 => 
            array (
                'id' => 'c567eb1e-2ad5-4423-a55e-79f1ebb6a1d4',
                'user_id' => 2,
                'name' => 'vacoda-screenshot',
                'token' => 'U5yHeKokp17eAfQaO44gKsfwevYkEuNB6F3p3UMFFjolMCSfB85Kxgvy1UDr',
                'metadata' => '[]',
                'transient' => 0,
                'last_used_at' => '2017-01-29 18:27:59',
                'expires_at' => NULL,
                'created_at' => '2017-01-28 04:11:32',
                'updated_at' => '2017-01-29 18:27:59',
            ),
        ));
        
        
    }
}
