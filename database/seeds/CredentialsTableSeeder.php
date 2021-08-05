<?php

use Illuminate\Database\Seeder;

class CredentialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('credentials')->delete();
        
        \DB::table('credentials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'team_id' => 1,
                'appsignature' => 'none',
                'clientid' => 'eyJpdiI6ImJcLzk2cTYweitYWk9wK0hRcmFUcVpnPT0iLCJ2YWx1ZSI6InhTR2ZIK0VtSkYyXC85ZW1yT29mODlnb3gzQ2xjTXJ1SnJMMTlYMTgxUWZRU3JqNU1ZYVVvaXV1ZHhtUEg5NExUIiwibWFjIjoiOWY0MDRkNmM2ZTRjNjk0Zjk0ZWE0ZTI5NDYyYjkyYjRiNjk2ZGFiMGJhMDkyZTA5NWVhMDdiNDhmMDk0YzVhYyJ9',
                'clientsecret' => 'eyJpdiI6IlZZdUlLczBwOUcwdXU1ZDJpZit1UWc9PSIsInZhbHVlIjoiK1ZqY3B6WlQ0amJBcGhzbXpPMjRpR1ljRE9qdVBBbGxkc0JZN3UyNnFYcWc2VnNvRnpYSWZoU3g1NG9jVDN5UyIsIm1hYyI6IjBmYjBmMGQ5MTAzYzllNmE5ZGYxNzZkMDE1ZTlhN2ZjMjUzOTJjZmJiYmZhMTZlOTRmYzRkMTI4MWMzMjBiMzIifQ==',
                'defaultwsdl' => 'https://webservice.exacttarget.com/etframework.wsdl',
                'xmlloc' => '/home/forge/vacoda.io/current/vendor/digitaladditive/exacttarget-laravel/src/FuelSdkPhp/ExactTargetWSDL.xml',
                'created_at' => '2016-11-11 21:41:13',
                'updated_at' => '2016-11-11 21:41:13',
            ),
            1 => 
            array (
                'id' => 2,
                'team_id' => 3,
                'appsignature' => 'none',
                'clientid' => 'eyJpdiI6Im05VWxEeE5DRUk3U3hHMnpuTXhhOHc9PSIsInZhbHVlIjoiRFBpdVg4TURPR05Nb3ptS1VnbDBKYUNiOFN3WVNRallBelhQNjl4TnlDMlpKOXlzK2YzTDVXMTlsU2pIYnZRNSIsIm1hYyI6IjU3ZmRkMWY0MjMzODk5YWIxYWI1ZGFjYTNmYzI2ODFkZmE1YTlmZWRlZDU3YmMzMmJlZGM5NDM1ZjRhMjJkYTUifQ==',
                'clientsecret' => 'eyJpdiI6IjBUYk53MGNYM3IzSWdQUVZqeXJcLytRPT0iLCJ2YWx1ZSI6Im1WVHd3SDE4SFZoVXpCbXhRakp2bUJPUmMxTXBQYndxS0ZucVNcL1A2TjJoN3g5MGdVMnpndnFSQ3o1d1NoelZ6IiwibWFjIjoiMzYwM2I4Y2I3MDA1ODQ5OWRmYzc4MjViMmVjN2NmOTVjNWVkNTA3OTYyMjhlYWNkNmY1NzQ5ZTdjZjA0MGU2YiJ9',
                'defaultwsdl' => 'https://webservice.exacttarget.com/etframework.wsdl',
                'xmlloc' => '/home/forge/vacoda.io/current/vendor/digitaladditive/exacttarget-laravel/src/FuelSdkPhp/ExactTargetWSDL.xml',
                'created_at' => '2016-11-11 21:41:13',
                'updated_at' => '2016-11-11 21:41:13',
            ),
        ));
        
        
    }
}
