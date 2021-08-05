<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('companies')->delete();
        
        \DB::table('companies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'urlName' => 'admin',
                'name' => 'Digital Additive',
                'description' => 'DA Admin Company Description',
                'company_contact_name' => '',
                'company_contact_email' => '',
                'da_executive' => '',
                'pricing_plan' => '',
                'created_at' => '2016-04-21 05:05:44',
                'updated_at' => '2016-04-21 05:05:44',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'urlName' => 'demo',
                'name' => 'Demo',
                'description' => 'Demo Company Description',
                'company_contact_name' => '',
                'company_contact_email' => '',
                'da_executive' => '',
                'pricing_plan' => '',
                'created_at' => '2016-04-21 05:05:44',
                'updated_at' => '2016-04-21 05:05:44',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'urlName' => 'thd',
                'name' => 'The Home Depot',
                'description' => 'THD Company Description',
                'company_contact_name' => '',
                'company_contact_email' => '',
                'da_executive' => '',
                'pricing_plan' => '',
                'created_at' => '2016-04-21 05:05:44',
                'updated_at' => '2016-04-21 05:05:44',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'urlName' => 'carters',
                'name' => 'Carter\'s | OshKosh B\'gosh',
                'description' => 'At Carter\'s, we embrace creative leadership, innovative teamwork and a winning spirit to be the best for the benefit of our customers, our consumers, our employees and our shareholders.',
                'company_contact_name' => 'Addie Rodriguez',
                'company_contact_email' => 'addie.rodriguez@digitaladditive.com',
                'da_executive' => 'Addie Rodriguez',
                'pricing_plan' => 'Taco',
                'created_at' => '2016-09-29 11:27:30',
                'updated_at' => '2016-09-29 11:27:30',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
