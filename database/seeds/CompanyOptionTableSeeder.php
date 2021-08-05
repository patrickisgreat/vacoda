<?php

use Illuminate\Database\Seeder;

class CompanyOptionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('company_option')->delete();
        
        \DB::table('company_option')->insert(array (
            0 => 
            array (
                'option_id' => 21,
                'company_id' => 1,
            ),
            1 => 
            array (
                'option_id' => 22,
                'company_id' => 1,
            ),
            2 => 
            array (
                'option_id' => 23,
                'company_id' => 1,
            ),
            3 => 
            array (
                'option_id' => 17,
                'company_id' => 2,
            ),
            4 => 
            array (
                'option_id' => 18,
                'company_id' => 2,
            ),
            5 => 
            array (
                'option_id' => 19,
                'company_id' => 2,
            ),
            6 => 
            array (
                'option_id' => 20,
                'company_id' => 2,
            ),
            7 => 
            array (
                'option_id' => 1,
                'company_id' => 3,
            ),
            8 => 
            array (
                'option_id' => 2,
                'company_id' => 3,
            ),
            9 => 
            array (
                'option_id' => 3,
                'company_id' => 3,
            ),
            10 => 
            array (
                'option_id' => 4,
                'company_id' => 3,
            ),
            11 => 
            array (
                'option_id' => 5,
                'company_id' => 3,
            ),
            12 => 
            array (
                'option_id' => 6,
                'company_id' => 3,
            ),
            13 => 
            array (
                'option_id' => 7,
                'company_id' => 3,
            ),
            14 => 
            array (
                'option_id' => 8,
                'company_id' => 3,
            ),
            15 => 
            array (
                'option_id' => 9,
                'company_id' => 3,
            ),
            16 => 
            array (
                'option_id' => 10,
                'company_id' => 3,
            ),
            17 => 
            array (
                'option_id' => 11,
                'company_id' => 3,
            ),
            18 => 
            array (
                'option_id' => 12,
                'company_id' => 3,
            ),
            19 => 
            array (
                'option_id' => 13,
                'company_id' => 3,
            ),
            20 => 
            array (
                'option_id' => 14,
                'company_id' => 3,
            ),
            21 => 
            array (
                'option_id' => 15,
                'company_id' => 3,
            ),
            22 => 
            array (
                'option_id' => 16,
                'company_id' => 3,
            ),
            23 => 
            array (
                'option_id' => 24,
                'company_id' => 4,
            ),
            24 => 
            array (
                'option_id' => 25,
                'company_id' => 4,
            ),
        ));
        
        
    }
}
