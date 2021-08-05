<?php

use Illuminate\Database\Seeder;

class CompanyLayoutTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('company_layout')->delete();
        
        \DB::table('company_layout')->insert(array (
            0 => 
            array (
                'layout_id' => 1,
                'company_id' => 1,
            ),
            1 => 
            array (
                'layout_id' => 2,
                'company_id' => 1,
            ),
            2 => 
            array (
                'layout_id' => 1,
                'company_id' => 2,
            ),
            3 => 
            array (
                'layout_id' => 2,
                'company_id' => 2,
            ),
            4 => 
            array (
                'layout_id' => 1,
                'company_id' => 3,
            ),
            5 => 
            array (
                'layout_id' => 2,
                'company_id' => 3,
            ),
            6 => 
            array (
                'layout_id' => 1,
                'company_id' => 4,
            ),
            7 => 
            array (
                'layout_id' => 2,
                'company_id' => 4,
            ),
        ));
        
        
    }
}
