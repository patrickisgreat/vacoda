<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('options')->delete();

        \DB::table('options')->insert(array (
            0 =>
            array (
                'id' => 1,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D21 - Lumber',
                'abbreviation' => 'D21',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D22 - Building Materials',
                'abbreviation' => 'D22',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D23 - Flooring',
                'abbreviation' => 'D23',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D24 - Paint',
                'abbreviation' => 'D24',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D25H - Hardware',
                'abbreviation' => 'D25H',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D25T - Tools',
                'abbreviation' => 'D25T',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D26P - Plumbing',
                'abbreviation' => 'D26P',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D27E - Electrical',
                'abbreviation' => 'D26P',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D27L - Lighting',
                'abbreviation' => 'D27L',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D28I - Lawn and Garden Indoor',
                'abbreviation' => 'D28I',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            10 =>
            array (
                'id' => 11,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D28O - Lawn and Garden Outdoor',
                'abbreviation' => 'D28O',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            11 =>
            array (
                'id' => 12,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D29A - Appliances',
                'abbreviation' => 'D29A',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            12 =>
            array (
                'id' => 13,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D29B – Kitchen & Bath',
                'abbreviation' => 'D29B',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            13 =>
            array (
                'id' => 14,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D30 - Millwork',
                'abbreviation' => 'D30',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            14 =>
            array (
                'id' => 15,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'D59 - Interior Decor',
                'abbreviation' => 'D59',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            15 =>
            array (
                'id' => 16,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'Credit',
                'abbreviation' => 'Credit',
                'created_at' => '2016-05-10 08:50:06',
                'updated_at' => '2016-05-10 08:50:06',
                'deleted_at' => NULL,
            ),
            16 =>
            array (
                'id' => 17,
                'team_id' => 2,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'Global',
                'abbreviation' => 'Global',
                'created_at' => '2016-05-10 09:29:53',
                'updated_at' => '2016-05-10 09:29:53',
                'deleted_at' => NULL,
            ),
            17 =>
            array (
                'id' => 18,
                'team_id' => 2,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'Shoes',
                'abbreviation' => 'Shoes',
                'created_at' => '2016-05-10 09:30:03',
                'updated_at' => '2016-05-10 09:30:03',
                'deleted_at' => NULL,
            ),
            18 =>
            array (
                'id' => 19,
                'team_id' => 2,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'Clothing',
                'abbreviation' => 'Clothing',
                'created_at' => '2016-05-10 09:30:33',
                'updated_at' => '2016-05-10 09:30:33',
                'deleted_at' => NULL,
            ),
            19 =>
            array (
                'id' => 20,
                'team_id' => 2,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'Sale',
                'abbreviation' => 'Sale',
                'created_at' => '2016-05-10 09:30:45',
                'updated_at' => '2016-05-10 09:30:45',
                'deleted_at' => NULL,
            ),
            20 =>
            array (
                'id' => 21,
                'team_id' => 1,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'DevOps',
                'abbreviation' => NULL,
                'created_at' => '2016-07-14 16:31:53',
                'updated_at' => '2016-07-14 16:31:53',
                'deleted_at' => NULL,
            ),
            21 =>
            array (
                'id' => 22,
                'team_id' => 1,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'Product',
                'abbreviation' => NULL,
                'created_at' => '2016-07-14 16:32:02',
                'updated_at' => '2016-07-14 16:32:02',
                'deleted_at' => NULL,
            ),
            22 =>
            array (
                'id' => 23,
                'team_id' => 1,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'Services',
                'abbreviation' => NULL,
                'created_at' => '2016-07-14 16:32:11',
                'updated_at' => '2016-07-14 16:32:11',
                'deleted_at' => NULL,
            ),
            23 =>
            array (
                'id' => 24,
                'team_id' => 4,
                'option_type_id' => 3,
                'creator_id' => 1,
                'name' => 'Carter\'s',
                'abbreviation' => 'CART',
                'created_at' => '2016-10-05 22:09:57',
                'updated_at' => '2016-12-21 12:30:02',
                'deleted_at' => NULL,
            ),
            24 =>
            array (
                'id' => 25,
                'team_id' => 4,
                'option_type_id' => 3,
                'creator_id' => 1,
                'name' => 'OshKosh B\'gosh',
                'abbreviation' => 'OKBG',
                'created_at' => '2016-10-05 22:10:10',
                'updated_at' => '2016-12-21 12:30:14',
                'deleted_at' => NULL,
            ),
            25 =>
            array (
                'id' => 26,
                'team_id' => 3,
                'option_type_id' => 1,
                'creator_id' => 1,
                'name' => 'Digital Décor',
                'abbreviation' => 'Digital Décor',
                'created_at' => '2018-02-27 08:50:06',
                'updated_at' => '2018-02-27 08:50:06',
                'deleted_at' => NULL,
            ),
        ));


    }
}
