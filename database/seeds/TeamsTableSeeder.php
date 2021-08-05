<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('teams')->delete();
        
        \DB::table('teams')->insert(array (
            0 => 
            array (
                'id' => 1,
                'owner_id' => 1,
                'name' => 'Digital Additive',
                'photo_url' => NULL,
                'stripe_id' => NULL,
                'current_billing_plan' => NULL,
                'card_brand' => NULL,
                'card_last_four' => NULL,
                'card_country' => NULL,
                'billing_address' => NULL,
                'billing_address_line_2' => NULL,
                'billing_city' => NULL,
                'billing_state' => NULL,
                'billing_zip' => NULL,
                'billing_country' => NULL,
                'vat_id' => NULL,
                'extra_billing_information' => NULL,
                'trial_ends_at' => NULL,
                'created_at' => '2016-04-21 09:05:44',
                'updated_at' => '2016-04-21 09:05:44',
                'description' => NULL,
                'team_contact_name' => NULL,
                'team_contact_email' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'owner_id' => 1,
                'name' => 'Demo',
                'photo_url' => NULL,
                'stripe_id' => NULL,
                'current_billing_plan' => NULL,
                'card_brand' => NULL,
                'card_last_four' => NULL,
                'card_country' => NULL,
                'billing_address' => NULL,
                'billing_address_line_2' => NULL,
                'billing_city' => NULL,
                'billing_state' => NULL,
                'billing_zip' => NULL,
                'billing_country' => NULL,
                'vat_id' => NULL,
                'extra_billing_information' => NULL,
                'trial_ends_at' => NULL,
                'created_at' => '2016-04-21 09:05:44',
                'updated_at' => '2016-04-21 09:05:44',
                'description' => NULL,
                'team_contact_name' => NULL,
                'team_contact_email' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'owner_id' => 1,
                'name' => 'The Home Depot',
                'photo_url' => NULL,
                'stripe_id' => NULL,
                'current_billing_plan' => NULL,
                'card_brand' => NULL,
                'card_last_four' => NULL,
                'card_country' => NULL,
                'billing_address' => NULL,
                'billing_address_line_2' => NULL,
                'billing_city' => NULL,
                'billing_state' => NULL,
                'billing_zip' => NULL,
                'billing_country' => NULL,
                'vat_id' => NULL,
                'extra_billing_information' => NULL,
                'trial_ends_at' => NULL,
                'created_at' => '2016-04-21 09:05:44',
                'updated_at' => '2016-04-21 09:05:44',
                'description' => NULL,
                'team_contact_name' => NULL,
                'team_contact_email' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'owner_id' => 86,
                'name' => 'Carter\'s | OshKosh B\'gosh',
                'photo_url' => NULL,
                'stripe_id' => NULL,
                'current_billing_plan' => NULL,
                'card_brand' => NULL,
                'card_last_four' => NULL,
                'card_country' => NULL,
                'billing_address' => NULL,
                'billing_address_line_2' => NULL,
                'billing_city' => NULL,
                'billing_state' => NULL,
                'billing_zip' => NULL,
                'billing_country' => NULL,
                'vat_id' => NULL,
                'extra_billing_information' => NULL,
                'trial_ends_at' => NULL,
                'created_at' => '2016-09-29 15:27:30',
                'updated_at' => '2016-09-29 15:27:30',
                'description' => NULL,
                'team_contact_name' => NULL,
                'team_contact_email' => NULL,
            ),
        ));
        
        
    }
}
