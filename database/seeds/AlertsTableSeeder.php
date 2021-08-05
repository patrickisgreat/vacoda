<?php

use Illuminate\Database\Seeder;

class AlertsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('alerts')->delete();
        
        
        
    }
}
