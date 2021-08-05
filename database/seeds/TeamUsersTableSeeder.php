<?php

use Illuminate\Database\Seeder;

class TeamUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('team_users')->delete();
        
        \DB::table('team_users')->insert(array (
            0 => 
            array (
                'team_id' => 1,
                'user_id' => 1,
                'role' => 'owner',
            ),
            1 => 
            array (
                'team_id' => 1,
                'user_id' => 2,
                'role' => '',
            ),
            2 => 
            array (
                'team_id' => 1,
                'user_id' => 3,
                'role' => '',
            ),
            3 => 
            array (
                'team_id' => 1,
                'user_id' => 5,
                'role' => '',
            ),
            4 => 
            array (
                'team_id' => 1,
                'user_id' => 6,
                'role' => '',
            ),
            5 => 
            array (
                'team_id' => 1,
                'user_id' => 7,
                'role' => '',
            ),
            6 => 
            array (
                'team_id' => 1,
                'user_id' => 8,
                'role' => '',
            ),
            7 => 
            array (
                'team_id' => 1,
                'user_id' => 9,
                'role' => '',
            ),
            8 => 
            array (
                'team_id' => 1,
                'user_id' => 10,
                'role' => '',
            ),
            9 => 
            array (
                'team_id' => 1,
                'user_id' => 70,
                'role' => '',
            ),
            10 => 
            array (
                'team_id' => 1,
                'user_id' => 71,
                'role' => '',
            ),
            11 => 
            array (
                'team_id' => 1,
                'user_id' => 72,
                'role' => '',
            ),
            12 => 
            array (
                'team_id' => 1,
                'user_id' => 73,
                'role' => '',
            ),
            13 => 
            array (
                'team_id' => 1,
                'user_id' => 74,
                'role' => '',
            ),
            14 => 
            array (
                'team_id' => 1,
                'user_id' => 82,
                'role' => '',
            ),
            15 => 
            array (
                'team_id' => 1,
                'user_id' => 86,
                'role' => '',
            ),
            16 => 
            array (
                'team_id' => 1,
                'user_id' => 89,
                'role' => '',
            ),
            17 => 
            array (
                'team_id' => 1,
                'user_id' => 91,
                'role' => '',
            ),
            18 => 
            array (
                'team_id' => 1,
                'user_id' => 92,
                'role' => '',
            ),
            19 => 
            array (
                'team_id' => 1,
                'user_id' => 99,
                'role' => '',
            ),
            20 => 
            array (
                'team_id' => 1,
                'user_id' => 100,
                'role' => '',
            ),
            21 => 
            array (
                'team_id' => 1,
                'user_id' => 101,
                'role' => '',
            ),
            24 => 
            array (
                'team_id' => 2,
                'user_id' => 2,
                'role' => '',
            ),
            25 => 
            array (
                'team_id' => 2,
                'user_id' => 76,
                'role' => '',
            ),
            26 => 
            array (
                'team_id' => 2,
                'user_id' => 77,
                'role' => '',
            ),
            27 => 
            array (
                'team_id' => 2,
                'user_id' => 78,
                'role' => '',
            ),
            28 => 
            array (
                'team_id' => 3,
                'user_id' => 1,
                'role' => 'owner',
            ),
            29 => 
            array (
                'team_id' => 3,
                'user_id' => 2,
                'role' => '',
            ),
            30 => 
            array (
                'team_id' => 3,
                'user_id' => 3,
                'role' => '',
            ),
            31 => 
            array (
                'team_id' => 3,
                'user_id' => 4,
                'role' => '',
            ),
            32 => 
            array (
                'team_id' => 3,
                'user_id' => 5,
                'role' => '',
            ),
            33 => 
            array (
                'team_id' => 3,
                'user_id' => 6,
                'role' => '',
            ),
            34 => 
            array (
                'team_id' => 3,
                'user_id' => 7,
                'role' => '',
            ),
            35 => 
            array (
                'team_id' => 3,
                'user_id' => 8,
                'role' => '',
            ),
            36 => 
            array (
                'team_id' => 3,
                'user_id' => 9,
                'role' => '',
            ),
            37 => 
            array (
                'team_id' => 3,
                'user_id' => 10,
                'role' => '',
            ),
            38 => 
            array (
                'team_id' => 3,
                'user_id' => 11,
                'role' => '',
            ),
            39 => 
            array (
                'team_id' => 3,
                'user_id' => 12,
                'role' => '',
            ),
            40 => 
            array (
                'team_id' => 3,
                'user_id' => 13,
                'role' => '',
            ),
            41 => 
            array (
                'team_id' => 3,
                'user_id' => 14,
                'role' => '',
            ),
            42 => 
            array (
                'team_id' => 3,
                'user_id' => 15,
                'role' => '',
            ),
            43 => 
            array (
                'team_id' => 3,
                'user_id' => 16,
                'role' => '',
            ),
            44 => 
            array (
                'team_id' => 3,
                'user_id' => 67,
                'role' => '',
            ),
            45 => 
            array (
                'team_id' => 3,
                'user_id' => 70,
                'role' => '',
            ),
            46 => 
            array (
                'team_id' => 3,
                'user_id' => 71,
                'role' => '',
            ),
            47 => 
            array (
                'team_id' => 3,
                'user_id' => 72,
                'role' => '',
            ),
            48 => 
            array (
                'team_id' => 3,
                'user_id' => 73,
                'role' => '',
            ),
            49 => 
            array (
                'team_id' => 3,
                'user_id' => 74,
                'role' => '',
            ),
            50 => 
            array (
                'team_id' => 3,
                'user_id' => 79,
                'role' => '',
            ),
            51 => 
            array (
                'team_id' => 3,
                'user_id' => 80,
                'role' => '',
            ),
            52 => 
            array (
                'team_id' => 3,
                'user_id' => 81,
                'role' => '',
            ),
            53 => 
            array (
                'team_id' => 3,
                'user_id' => 82,
                'role' => '',
            ),
            54 => 
            array (
                'team_id' => 3,
                'user_id' => 85,
                'role' => '',
            ),
            55 => 
            array (
                'team_id' => 3,
                'user_id' => 86,
                'role' => '',
            ),
            56 => 
            array (
                'team_id' => 3,
                'user_id' => 89,
                'role' => '',
            ),
            57 => 
            array (
                'team_id' => 3,
                'user_id' => 90,
                'role' => '',
            ),
            58 => 
            array (
                'team_id' => 3,
                'user_id' => 92,
                'role' => '',
            ),
            59 => 
            array (
                'team_id' => 3,
                'user_id' => 93,
                'role' => '',
            ),
            60 => 
            array (
                'team_id' => 3,
                'user_id' => 94,
                'role' => '',
            ),
            61 => 
            array (
                'team_id' => 3,
                'user_id' => 95,
                'role' => '',
            ),
            62 => 
            array (
                'team_id' => 3,
                'user_id' => 96,
                'role' => '',
            ),
            63 => 
            array (
                'team_id' => 3,
                'user_id' => 97,
                'role' => '',
            ),
            64 => 
            array (
                'team_id' => 3,
                'user_id' => 98,
                'role' => '',
            ),
            65 => 
            array (
                'team_id' => 3,
                'user_id' => 99,
                'role' => '',
            ),
            66 => 
            array (
                'team_id' => 3,
                'user_id' => 100,
                'role' => '',
            ),
            67 => 
            array (
                'team_id' => 3,
                'user_id' => 101,
                'role' => '',
            ),
            68 => 
            array (
                'team_id' => 4,
                'user_id' => 2,
                'role' => '',
            ),
            69 => 
            array (
                'team_id' => 4,
                'user_id' => 86,
                'role' => '',
            ),
            70 => 
            array (
                'team_id' => 4,
                'user_id' => 87,
                'role' => '',
            ),
            71 => 
            array (
                'team_id' => 4,
                'user_id' => 88,
                'role' => '',
            ),
            72 =>
                array (
                    'team_id' => 1,
                    'user_id' => 102,
                    'role' => '',
                ),
            73 =>
                array (
                    'team_id' => 1,
                    'user_id' => 103,
                    'role' => '',
                ),
            74 =>
                array (
                    'team_id' => 1,
                    'user_id' => 104,
                    'role' => '',
                ),
            75 =>
                array (
                    'team_id' => 1,
                    'user_id' => 105,
                    'role' => '',
                ),
            76 =>
                array (
                    'team_id' => 1,
                    'user_id' => 4,
                    'role' => '',
                ),
        ));
        
        
    }
}
