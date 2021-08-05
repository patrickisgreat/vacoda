<?php

use Illuminate\Database\Seeder;

class PasswordResetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('password_resets')->delete();
        
        \DB::table('password_resets')->insert(array (
            0 => 
            array (
                'email' => 'Jessica_Higgins@homedepot.com',
                'token' => 'ee47b92f838fb894d2e2729be534b830ff5da42614d673db899b1a53c0ec6cf3',
                'created_at' => '2016-12-14 19:49:23',
            ),
            1 => 
            array (
                'email' => 'kali.dombrowski@digitaladditive.com',
                'token' => '4ba94c8118358506222d539468abb3c7a51b5da1a5adc50276fc8b805a015587',
                'created_at' => '2017-04-11 19:53:58',
            ),
        ));
        
        
    }
}
