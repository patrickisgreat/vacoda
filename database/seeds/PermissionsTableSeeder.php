<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'team_id' => 1,
                'name' => 'list_role',
                'label' => 'Can View Roles List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            1 => 
            array (
                'id' => 2,
                'team_id' => 1,
                'name' => 'show_role',
                'label' => 'Can View A Role',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            2 => 
            array (
                'id' => 3,
                'team_id' => 1,
                'name' => 'update_role',
                'label' => 'Can Edit Roles',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            3 => 
            array (
                'id' => 4,
                'team_id' => 1,
                'name' => 'store_role',
                'label' => 'Can Create Roles',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            4 => 
            array (
                'id' => 5,
                'team_id' => 1,
                'name' => 'destroy_role',
                'label' => 'Can Archive Roles',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            5 => 
            array (
                'id' => 6,
                'team_id' => 1,
                'name' => 'show_dashboard',
                'label' => 'Can View Dashboard',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            6 => 
            array (
                'id' => 7,
                'team_id' => 1,
                'name' => 'list_banner',
                'label' => 'Can View Banners List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            7 => 
            array (
                'id' => 8,
                'team_id' => 1,
                'name' => 'show_banner',
                'label' => 'Can View Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            8 => 
            array (
                'id' => 9,
                'team_id' => 1,
                'name' => 'search_banner',
                'label' => 'Can Search Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            9 => 
            array (
                'id' => 10,
                'team_id' => 1,
                'name' => 'update_banner',
                'label' => 'Can Edit Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            10 => 
            array (
                'id' => 11,
                'team_id' => 1,
                'name' => 'store_banner',
                'label' => 'Can Create Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            11 => 
            array (
                'id' => 12,
                'team_id' => 1,
                'name' => 'destroy_banner',
                'label' => 'Can Archive Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            12 => 
            array (
                'id' => 13,
                'team_id' => 1,
                'name' => 'approve_banner',
                'label' => 'Can Approve Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            13 => 
            array (
                'id' => 14,
                'team_id' => 1,
                'name' => 'deny_banner',
                'label' => 'Can Deny Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            14 => 
            array (
                'id' => 15,
                'team_id' => 1,
                'name' => 'export_banner',
                'label' => 'Can Export Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            15 => 
            array (
                'id' => 16,
                'team_id' => 1,
                'name' => 'list_offer',
                'label' => 'Can View Offers List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            16 => 
            array (
                'id' => 17,
                'team_id' => 1,
                'name' => 'show_offer',
                'label' => 'Can View Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            17 => 
            array (
                'id' => 18,
                'team_id' => 1,
                'name' => 'update_offer',
                'label' => 'Can Edit Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            18 => 
            array (
                'id' => 19,
                'team_id' => 1,
                'name' => 'store_offer',
                'label' => 'Can Create Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            19 => 
            array (
                'id' => 20,
                'team_id' => 1,
                'name' => 'destroy_offer',
                'label' => 'Can Archive Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            20 => 
            array (
                'id' => 21,
                'team_id' => 1,
                'name' => 'export_offer',
                'label' => 'Can Export Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            21 => 
            array (
                'id' => 22,
                'team_id' => 1,
                'name' => 'import_offer',
                'label' => 'Can Import Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            22 => 
            array (
                'id' => 23,
                'team_id' => 1,
                'name' => 'list_template',
                'label' => 'Can View Templates List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            23 => 
            array (
                'id' => 24,
                'team_id' => 1,
                'name' => 'show_template',
                'label' => 'Can View Templates',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            24 => 
            array (
                'id' => 25,
                'team_id' => 1,
                'name' => 'list_theme',
                'label' => 'Can View Theme List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            25 => 
            array (
                'id' => 26,
                'team_id' => 1,
                'name' => 'update_theme',
                'label' => 'Can Edit Themes',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            26 => 
            array (
                'id' => 27,
                'team_id' => 1,
                'name' => 'store_theme',
                'label' => 'Can Create Themes',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            27 => 
            array (
                'id' => 28,
                'team_id' => 1,
                'name' => 'destroy_theme',
                'label' => 'Can Archive Themes',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            28 => 
            array (
                'id' => 29,
                'team_id' => 1,
                'name' => 'view_themes',
                'label' => 'Can View Themes',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            29 => 
            array (
                'id' => 30,
                'team_id' => 1,
                'name' => 'list_user',
                'label' => 'Can View User List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            30 => 
            array (
                'id' => 31,
                'team_id' => 1,
                'name' => 'show_user',
                'label' => 'Can View Users',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            31 => 
            array (
                'id' => 32,
                'team_id' => 1,
                'name' => 'update_user',
                'label' => 'Can Edit Users',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            32 => 
            array (
                'id' => 33,
                'team_id' => 1,
                'name' => 'store_user',
                'label' => 'Can Create Users',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            33 => 
            array (
                'id' => 34,
                'team_id' => 1,
                'name' => 'destroy_user',
                'label' => 'Can Archive Users',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            34 => 
            array (
                'id' => 35,
                'team_id' => 1,
                'name' => 'list_option',
                'label' => 'Can List Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            35 => 
            array (
                'id' => 36,
                'team_id' => 1,
                'name' => 'show_option',
                'label' => 'Can View Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            36 => 
            array (
                'id' => 37,
                'team_id' => 1,
                'name' => 'update_option',
                'label' => 'Can Edit Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            37 => 
            array (
                'id' => 38,
                'team_id' => 1,
                'name' => 'destroy_option',
                'label' => 'Can Archive Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            38 => 
            array (
                'id' => 39,
                'team_id' => 1,
                'name' => 'store_option',
                'label' => 'Can Create Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            39 => 
            array (
                'id' => 40,
                'team_id' => 1,
                'name' => 'list_optiontype',
                'label' => 'Can List Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            40 => 
            array (
                'id' => 41,
                'team_id' => 1,
                'name' => 'show_optiontype',
                'label' => 'Can View Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            41 => 
            array (
                'id' => 42,
                'team_id' => 1,
                'name' => 'update_optiontype',
                'label' => 'Can Edit Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            42 => 
            array (
                'id' => 43,
                'team_id' => 1,
                'name' => 'destroy_optiontype',
                'label' => 'Can Archive Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            43 => 
            array (
                'id' => 44,
                'team_id' => 1,
                'name' => 'store_optiontype',
                'label' => 'Can Create Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            44 => 
            array (
                'id' => 45,
                'team_id' => 2,
                'name' => 'list_role',
                'label' => 'Can View Roles List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            45 => 
            array (
                'id' => 46,
                'team_id' => 2,
                'name' => 'show_role',
                'label' => 'Can View A Role',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            46 => 
            array (
                'id' => 47,
                'team_id' => 2,
                'name' => 'update_role',
                'label' => 'Can Edit Roles',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            47 => 
            array (
                'id' => 48,
                'team_id' => 2,
                'name' => 'store_role',
                'label' => 'Can Create Roles',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            48 => 
            array (
                'id' => 49,
                'team_id' => 2,
                'name' => 'destroy_role',
                'label' => 'Can Archive Roles',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            49 => 
            array (
                'id' => 50,
                'team_id' => 2,
                'name' => 'show_dashboard',
                'label' => 'Can View Dashboard',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            50 => 
            array (
                'id' => 51,
                'team_id' => 2,
                'name' => 'list_banner',
                'label' => 'Can View Banners List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            51 => 
            array (
                'id' => 52,
                'team_id' => 2,
                'name' => 'show_banner',
                'label' => 'Can View Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            52 => 
            array (
                'id' => 53,
                'team_id' => 2,
                'name' => 'search_banner',
                'label' => 'Can Search Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            53 => 
            array (
                'id' => 54,
                'team_id' => 2,
                'name' => 'update_banner',
                'label' => 'Can Edit Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            54 => 
            array (
                'id' => 55,
                'team_id' => 2,
                'name' => 'store_banner',
                'label' => 'Can Create Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            55 => 
            array (
                'id' => 56,
                'team_id' => 2,
                'name' => 'destroy_banner',
                'label' => 'Can Archive Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            56 => 
            array (
                'id' => 57,
                'team_id' => 2,
                'name' => 'approve_banner',
                'label' => 'Can Approve Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            57 => 
            array (
                'id' => 58,
                'team_id' => 2,
                'name' => 'deny_banner',
                'label' => 'Can Deny Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            58 => 
            array (
                'id' => 59,
                'team_id' => 2,
                'name' => 'export_banner',
                'label' => 'Can Export Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            59 => 
            array (
                'id' => 60,
                'team_id' => 2,
                'name' => 'list_offer',
                'label' => 'Can View Offers List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            60 => 
            array (
                'id' => 61,
                'team_id' => 2,
                'name' => 'show_offer',
                'label' => 'Can View Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            61 => 
            array (
                'id' => 62,
                'team_id' => 2,
                'name' => 'update_offer',
                'label' => 'Can Edit Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            62 => 
            array (
                'id' => 63,
                'team_id' => 2,
                'name' => 'store_offer',
                'label' => 'Can Create Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            63 => 
            array (
                'id' => 64,
                'team_id' => 2,
                'name' => 'destroy_offer',
                'label' => 'Can Archive Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            64 => 
            array (
                'id' => 65,
                'team_id' => 2,
                'name' => 'export_offer',
                'label' => 'Can Export Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            65 => 
            array (
                'id' => 66,
                'team_id' => 2,
                'name' => 'import_offer',
                'label' => 'Can Import Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            66 => 
            array (
                'id' => 67,
                'team_id' => 2,
                'name' => 'list_template',
                'label' => 'Can View Templates List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            67 => 
            array (
                'id' => 68,
                'team_id' => 2,
                'name' => 'show_template',
                'label' => 'Can View Templates',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            68 => 
            array (
                'id' => 69,
                'team_id' => 2,
                'name' => 'list_theme',
                'label' => 'Can View Theme List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            69 => 
            array (
                'id' => 70,
                'team_id' => 2,
                'name' => 'update_theme',
                'label' => 'Can Edit Themes',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            70 => 
            array (
                'id' => 71,
                'team_id' => 2,
                'name' => 'store_theme',
                'label' => 'Can Create Themes',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            71 => 
            array (
                'id' => 72,
                'team_id' => 2,
                'name' => 'destroy_theme',
                'label' => 'Can Archive Themes',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            72 => 
            array (
                'id' => 73,
                'team_id' => 2,
                'name' => 'view_themes',
                'label' => 'Can View Themes',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            73 => 
            array (
                'id' => 74,
                'team_id' => 2,
                'name' => 'list_user',
                'label' => 'Can View User List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            74 => 
            array (
                'id' => 75,
                'team_id' => 2,
                'name' => 'show_user',
                'label' => 'Can View Users',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            75 => 
            array (
                'id' => 76,
                'team_id' => 2,
                'name' => 'update_user',
                'label' => 'Can Edit Users',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            76 => 
            array (
                'id' => 77,
                'team_id' => 2,
                'name' => 'store_user',
                'label' => 'Can Create Users',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            77 => 
            array (
                'id' => 78,
                'team_id' => 2,
                'name' => 'destroy_user',
                'label' => 'Can Archive Users',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            78 => 
            array (
                'id' => 79,
                'team_id' => 2,
                'name' => 'list_option',
                'label' => 'Can List Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            79 => 
            array (
                'id' => 80,
                'team_id' => 2,
                'name' => 'show_option',
                'label' => 'Can View Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            80 => 
            array (
                'id' => 81,
                'team_id' => 2,
                'name' => 'update_option',
                'label' => 'Can Edit Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            81 => 
            array (
                'id' => 82,
                'team_id' => 2,
                'name' => 'destroy_option',
                'label' => 'Can Archive Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            82 => 
            array (
                'id' => 83,
                'team_id' => 2,
                'name' => 'store_option',
                'label' => 'Can Create Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            83 => 
            array (
                'id' => 84,
                'team_id' => 2,
                'name' => 'list_optiontype',
                'label' => 'Can List Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            84 => 
            array (
                'id' => 85,
                'team_id' => 2,
                'name' => 'show_optiontype',
                'label' => 'Can View Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            85 => 
            array (
                'id' => 86,
                'team_id' => 2,
                'name' => 'update_optiontype',
                'label' => 'Can Edit Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            86 => 
            array (
                'id' => 87,
                'team_id' => 2,
                'name' => 'destroy_optiontype',
                'label' => 'Can Archive Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            87 => 
            array (
                'id' => 88,
                'team_id' => 2,
                'name' => 'store_optiontype',
                'label' => 'Can Create Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            88 => 
            array (
                'id' => 89,
                'team_id' => 3,
                'name' => 'list_role',
                'label' => 'Can View Roles List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            89 => 
            array (
                'id' => 90,
                'team_id' => 3,
                'name' => 'show_role',
                'label' => 'Can View A Role',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            90 => 
            array (
                'id' => 91,
                'team_id' => 3,
                'name' => 'update_role',
                'label' => 'Can Edit Roles',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            91 => 
            array (
                'id' => 92,
                'team_id' => 3,
                'name' => 'store_role',
                'label' => 'Can Create Roles',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            92 => 
            array (
                'id' => 93,
                'team_id' => 3,
                'name' => 'destroy_role',
                'label' => 'Can Archive Roles',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            93 => 
            array (
                'id' => 94,
                'team_id' => 3,
                'name' => 'show_dashboard',
                'label' => 'Can View Dashboard',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            94 => 
            array (
                'id' => 95,
                'team_id' => 3,
                'name' => 'list_banner',
                'label' => 'Can View Banners List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            95 => 
            array (
                'id' => 96,
                'team_id' => 3,
                'name' => 'show_banner',
                'label' => 'Can View Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            96 => 
            array (
                'id' => 97,
                'team_id' => 3,
                'name' => 'search_banner',
                'label' => 'Can Search Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            97 => 
            array (
                'id' => 98,
                'team_id' => 3,
                'name' => 'update_banner',
                'label' => 'Can Edit Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            98 => 
            array (
                'id' => 99,
                'team_id' => 3,
                'name' => 'store_banner',
                'label' => 'Can Create Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            99 => 
            array (
                'id' => 100,
                'team_id' => 3,
                'name' => 'destroy_banner',
                'label' => 'Can Archive Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            100 => 
            array (
                'id' => 101,
                'team_id' => 3,
                'name' => 'approve_banner',
                'label' => 'Can Approve Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            101 => 
            array (
                'id' => 102,
                'team_id' => 3,
                'name' => 'deny_banner',
                'label' => 'Can Deny Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            102 => 
            array (
                'id' => 103,
                'team_id' => 3,
                'name' => 'export_banner',
                'label' => 'Can Export Banners',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            103 => 
            array (
                'id' => 104,
                'team_id' => 3,
                'name' => 'list_offer',
                'label' => 'Can View Offers List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            104 => 
            array (
                'id' => 105,
                'team_id' => 3,
                'name' => 'show_offer',
                'label' => 'Can View Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            105 => 
            array (
                'id' => 106,
                'team_id' => 3,
                'name' => 'update_offer',
                'label' => 'Can Edit Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            106 => 
            array (
                'id' => 107,
                'team_id' => 3,
                'name' => 'store_offer',
                'label' => 'Can Create Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            107 => 
            array (
                'id' => 108,
                'team_id' => 3,
                'name' => 'destroy_offer',
                'label' => 'Can Archive Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            108 => 
            array (
                'id' => 109,
                'team_id' => 3,
                'name' => 'export_offer',
                'label' => 'Can Export Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            109 => 
            array (
                'id' => 110,
                'team_id' => 3,
                'name' => 'import_offer',
                'label' => 'Can Import Offers',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            110 => 
            array (
                'id' => 111,
                'team_id' => 3,
                'name' => 'list_template',
                'label' => 'Can View Templates List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            111 => 
            array (
                'id' => 112,
                'team_id' => 3,
                'name' => 'show_template',
                'label' => 'Can View Templates',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            112 => 
            array (
                'id' => 113,
                'team_id' => 3,
                'name' => 'list_theme',
                'label' => 'Can View Theme List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            113 => 
            array (
                'id' => 114,
                'team_id' => 3,
                'name' => 'update_theme',
                'label' => 'Can Edit Themes',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            114 => 
            array (
                'id' => 115,
                'team_id' => 3,
                'name' => 'store_theme',
                'label' => 'Can Create Themes',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            115 => 
            array (
                'id' => 116,
                'team_id' => 3,
                'name' => 'destroy_theme',
                'label' => 'Can Archive Themes',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            116 => 
            array (
                'id' => 117,
                'team_id' => 3,
                'name' => 'view_themes',
                'label' => 'Can View Themes',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            117 => 
            array (
                'id' => 118,
                'team_id' => 3,
                'name' => 'list_user',
                'label' => 'Can View User List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            118 => 
            array (
                'id' => 119,
                'team_id' => 3,
                'name' => 'show_user',
                'label' => 'Can View Users',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            119 => 
            array (
                'id' => 120,
                'team_id' => 3,
                'name' => 'update_user',
                'label' => 'Can Edit Users',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            120 => 
            array (
                'id' => 121,
                'team_id' => 3,
                'name' => 'store_user',
                'label' => 'Can Create Users',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            121 => 
            array (
                'id' => 122,
                'team_id' => 3,
                'name' => 'destroy_user',
                'label' => 'Can Archive Users',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            122 => 
            array (
                'id' => 123,
                'team_id' => 3,
                'name' => 'list_option',
                'label' => 'Can List Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            123 => 
            array (
                'id' => 124,
                'team_id' => 3,
                'name' => 'show_option',
                'label' => 'Can View Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            124 => 
            array (
                'id' => 125,
                'team_id' => 3,
                'name' => 'update_option',
                'label' => 'Can Edit Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            125 => 
            array (
                'id' => 126,
                'team_id' => 3,
                'name' => 'destroy_option',
                'label' => 'Can Archive Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            126 => 
            array (
                'id' => 127,
                'team_id' => 3,
                'name' => 'store_option',
                'label' => 'Can Create Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            127 => 
            array (
                'id' => 128,
                'team_id' => 3,
                'name' => 'list_optiontype',
                'label' => 'Can List Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            128 => 
            array (
                'id' => 129,
                'team_id' => 3,
                'name' => 'show_optiontype',
                'label' => 'Can View Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            129 => 
            array (
                'id' => 130,
                'team_id' => 3,
                'name' => 'update_optiontype',
                'label' => 'Can Edit Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            130 => 
            array (
                'id' => 131,
                'team_id' => 3,
                'name' => 'destroy_optiontype',
                'label' => 'Can Archive Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            131 => 
            array (
                'id' => 132,
                'team_id' => 3,
                'name' => 'store_optiontype',
                'label' => 'Can Create Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            132 => 
            array (
                'id' => 133,
                'team_id' => 1,
                'name' => 'list_template',
                'label' => 'Can View Templates List',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            133 => 
            array (
                'id' => 134,
                'team_id' => 1,
                'name' => 'update_template',
                'label' => 'Can Edit Templates',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            134 => 
            array (
                'id' => 135,
                'team_id' => 1,
                'name' => 'store_template',
                'label' => 'Can Create Templates',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            135 => 
            array (
                'id' => 136,
                'team_id' => 1,
                'name' => 'destroy_template',
                'label' => 'Can Archive Templates',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            136 => 
            array (
                'id' => 137,
                'team_id' => 1,
                'name' => 'view_companies',
                'label' => 'Can View Companies',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            137 => 
            array (
                'id' => 138,
                'team_id' => 1,
                'name' => 'update_company',
                'label' => 'Can Edit Companies',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            138 => 
            array (
                'id' => 139,
                'team_id' => 1,
                'name' => 'store_company',
                'label' => 'Can Create Companies',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            139 => 
            array (
                'id' => 140,
                'team_id' => 1,
                'name' => 'destroy_company',
                'label' => 'Can Archive Companies',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            140 => 
            array (
                'id' => 141,
                'team_id' => 1,
                'name' => 'assign_companies',
                'label' => 'Can Assign Companies',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            141 => 
            array (
                'id' => 142,
                'team_id' => 1,
                'name' => 'list_option',
                'label' => 'Can List Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            142 => 
            array (
                'id' => 143,
                'team_id' => 1,
                'name' => 'show_option',
                'label' => 'Can View Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            143 => 
            array (
                'id' => 144,
                'team_id' => 1,
                'name' => 'update_option',
                'label' => 'Can Edit Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            144 => 
            array (
                'id' => 145,
                'team_id' => 1,
                'name' => 'destroy_option',
                'label' => 'Can Archive Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            145 => 
            array (
                'id' => 146,
                'team_id' => 1,
                'name' => 'store_option',
                'label' => 'Can Create Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            146 => 
            array (
                'id' => 147,
                'team_id' => 1,
                'name' => 'list_optiontype',
                'label' => 'Can List Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            147 => 
            array (
                'id' => 148,
                'team_id' => 1,
                'name' => 'show_optiontype',
                'label' => 'Can View Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            148 => 
            array (
                'id' => 149,
                'team_id' => 1,
                'name' => 'update_optiontype',
                'label' => 'Can Edit Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            149 => 
            array (
                'id' => 150,
                'team_id' => 1,
                'name' => 'destroy_optiontype',
                'label' => 'Can Archive Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            150 => 
            array (
                'id' => 151,
                'team_id' => 1,
                'name' => 'store_optiontype',
                'label' => 'Can Create Options',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            151 => 
            array (
                'id' => 152,
                'team_id' => 1,
                'name' => 'all_mighty',
                'label' => 'Can Do Everything',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            152 => 
            array (
                'id' => 153,
                'team_id' => 1,
                'name' => 'show_user',
                'label' => 'Can View Users',
                'created_at' => '2016-11-02 19:16:13',
                'updated_at' => '2016-11-02 19:16:13',
            ),
            153 => 
            array (
                'id' => 154,
                'team_id' => 4,
                'name' => 'list_role',
                'label' => 'Can View Roles List',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            154 => 
            array (
                'id' => 155,
                'team_id' => 4,
                'name' => 'show_role',
                'label' => 'Can View A Role',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            155 => 
            array (
                'id' => 156,
                'team_id' => 4,
                'name' => 'update_role',
                'label' => 'Can Edit Roles',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            156 => 
            array (
                'id' => 157,
                'team_id' => 4,
                'name' => 'store_role',
                'label' => 'Can Create Roles',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            157 => 
            array (
                'id' => 158,
                'team_id' => 4,
                'name' => 'destroy_role',
                'label' => 'Can Archive Roles',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            158 => 
            array (
                'id' => 159,
                'team_id' => 4,
                'name' => 'show_dashboard',
                'label' => 'Can View Dashboard',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            159 => 
            array (
                'id' => 160,
                'team_id' => 4,
                'name' => 'list_banner',
                'label' => 'Can View Banners List',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            160 => 
            array (
                'id' => 161,
                'team_id' => 4,
                'name' => 'show_banner',
                'label' => 'Can View Banners',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            161 => 
            array (
                'id' => 162,
                'team_id' => 4,
                'name' => 'search_banner',
                'label' => 'Can Search Banners',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            162 => 
            array (
                'id' => 163,
                'team_id' => 4,
                'name' => 'update_banner',
                'label' => 'Can Edit Banners',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            163 => 
            array (
                'id' => 164,
                'team_id' => 4,
                'name' => 'store_banner',
                'label' => 'Can Create Banners',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            164 => 
            array (
                'id' => 165,
                'team_id' => 4,
                'name' => 'destroy_banner',
                'label' => 'Can Archive Banners',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            165 => 
            array (
                'id' => 166,
                'team_id' => 4,
                'name' => 'approve_banner',
                'label' => 'Can Approve Banners',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            166 => 
            array (
                'id' => 167,
                'team_id' => 4,
                'name' => 'deny_banner',
                'label' => 'Can Deny Banners',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            167 => 
            array (
                'id' => 168,
                'team_id' => 4,
                'name' => 'export_banner',
                'label' => 'Can Export Banners',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            168 => 
            array (
                'id' => 169,
                'team_id' => 4,
                'name' => 'list_offer',
                'label' => 'Can View Offers List',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            169 => 
            array (
                'id' => 170,
                'team_id' => 4,
                'name' => 'show_offer',
                'label' => 'Can View Offers',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            170 => 
            array (
                'id' => 171,
                'team_id' => 4,
                'name' => 'update_offer',
                'label' => 'Can Edit Offers',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            171 => 
            array (
                'id' => 172,
                'team_id' => 4,
                'name' => 'store_offer',
                'label' => 'Can Create Offers',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            172 => 
            array (
                'id' => 173,
                'team_id' => 4,
                'name' => 'destroy_offer',
                'label' => 'Can Archive Offers',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            173 => 
            array (
                'id' => 174,
                'team_id' => 4,
                'name' => 'export_offer',
                'label' => 'Can Export Offers',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            174 => 
            array (
                'id' => 175,
                'team_id' => 4,
                'name' => 'import_offer',
                'label' => 'Can Import Offers',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            175 => 
            array (
                'id' => 176,
                'team_id' => 4,
                'name' => 'list_template',
                'label' => 'Can View Templates List',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            176 => 
            array (
                'id' => 177,
                'team_id' => 4,
                'name' => 'show_template',
                'label' => 'Can View Templates',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            177 => 
            array (
                'id' => 178,
                'team_id' => 4,
                'name' => 'list_theme',
                'label' => 'Can View Theme List',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            178 => 
            array (
                'id' => 179,
                'team_id' => 4,
                'name' => 'update_theme',
                'label' => 'Can Edit Themes',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            179 => 
            array (
                'id' => 180,
                'team_id' => 4,
                'name' => 'store_theme',
                'label' => 'Can Create Themes',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            180 => 
            array (
                'id' => 181,
                'team_id' => 4,
                'name' => 'destroy_theme',
                'label' => 'Can Archive Themes',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            181 => 
            array (
                'id' => 182,
                'team_id' => 4,
                'name' => 'view_themes',
                'label' => 'Can View Themes',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            182 => 
            array (
                'id' => 183,
                'team_id' => 4,
                'name' => 'list_user',
                'label' => 'Can View User List',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            183 => 
            array (
                'id' => 184,
                'team_id' => 4,
                'name' => 'show_user',
                'label' => 'Can View Users',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            184 => 
            array (
                'id' => 185,
                'team_id' => 4,
                'name' => 'update_user',
                'label' => 'Can Edit Users',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            185 => 
            array (
                'id' => 186,
                'team_id' => 4,
                'name' => 'store_user',
                'label' => 'Can Create Users',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            186 => 
            array (
                'id' => 187,
                'team_id' => 4,
                'name' => 'destroy_user',
                'label' => 'Can Archive Users',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            187 => 
            array (
                'id' => 188,
                'team_id' => 4,
                'name' => 'list_option',
                'label' => 'Can List Options',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            188 => 
            array (
                'id' => 189,
                'team_id' => 4,
                'name' => 'show_option',
                'label' => 'Can View Options',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            189 => 
            array (
                'id' => 190,
                'team_id' => 4,
                'name' => 'update_option',
                'label' => 'Can Edit Options',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            190 => 
            array (
                'id' => 191,
                'team_id' => 4,
                'name' => 'destroy_option',
                'label' => 'Can Archive Options',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            191 => 
            array (
                'id' => 192,
                'team_id' => 4,
                'name' => 'store_option',
                'label' => 'Can Create Options',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            192 => 
            array (
                'id' => 193,
                'team_id' => 4,
                'name' => 'list_optiontype',
                'label' => 'Can List Options',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            193 => 
            array (
                'id' => 194,
                'team_id' => 4,
                'name' => 'show_optiontype',
                'label' => 'Can View Options',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            194 => 
            array (
                'id' => 195,
                'team_id' => 4,
                'name' => 'update_optiontype',
                'label' => 'Can Edit Options',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            195 => 
            array (
                'id' => 196,
                'team_id' => 4,
                'name' => 'destroy_optiontype',
                'label' => 'Can Archive Options',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            196 => 
            array (
                'id' => 197,
                'team_id' => 4,
                'name' => 'store_optiontype',
                'label' => 'Can Create Options',
                'created_at' => '2016-12-20 20:16:12',
                'updated_at' => '2016-12-20 20:16:12',
            ),
            197 => 
            array (
                'id' => 198,
                'team_id' => 4,
                'name' => 'update_template',
                'label' => 'Can Edit Templates',
                'created_at' => '2016-12-20 20:16:13',
                'updated_at' => '2016-12-20 20:16:13',
            ),
            198 => 
            array (
                'id' => 199,
                'team_id' => 4,
                'name' => 'store_template',
                'label' => 'Can Create Templates',
                'created_at' => '2016-12-20 20:16:13',
                'updated_at' => '2016-12-20 20:16:13',
            ),
            199 => 
            array (
                'id' => 200,
                'team_id' => 4,
                'name' => 'destroy_template',
                'label' => 'Can Archive Templates',
                'created_at' => '2016-12-20 20:16:13',
                'updated_at' => '2016-12-20 20:16:13',
            ),
            200 => 
            array (
                'id' => 201,
                'team_id' => 1,
                'name' => 'edit_approved_banner',
                'label' => 'Can Edit an Approved Banner',
                'created_at' => '2017-01-27 20:16:13',
                'updated_at' => '2017-01-27 20:16:13',
            ),
            201 => 
            array (
                'id' => 202,
                'team_id' => 3,
                'name' => 'edit_approved_banner',
                'label' => 'Can Edit an Approved Banner',
                'created_at' => '2017-01-27 20:16:13',
                'updated_at' => '2017-01-27 20:16:13',
            ),
            202 => 
            array (
                'id' => 203,
                'team_id' => 1,
                'name' => 'restore_banner',
                'label' => 'Can Restore A Banner',
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
            ),
            203 => 
            array (
                'id' => 204,
                'team_id' => 1,
                'name' => 'restore_offer',
                'label' => 'Can Restore An Offer',
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
            ),
            204 => 
            array (
                'id' => 205,
                'team_id' => 2,
                'name' => 'restore_banner',
                'label' => 'Can Restore A Banner',
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
            ),
            205 => 
            array (
                'id' => 206,
                'team_id' => 2,
                'name' => 'restore_offer',
                'label' => 'Can Restore An Offer',
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
            ),
            206 => 
            array (
                'id' => 207,
                'team_id' => 3,
                'name' => 'restore_banner',
                'label' => 'Can Restore A Banner',
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
            ),
            207 => 
            array (
                'id' => 208,
                'team_id' => 3,
                'name' => 'restore_offer',
                'label' => 'Can Restore An Offer',
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
            ),
            208 => 
            array (
                'id' => 209,
                'team_id' => 4,
                'name' => 'restore_banner',
                'label' => 'Can Restore A Banner',
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
            ),
            209 => 
            array (
                'id' => 210,
                'team_id' => 4,
                'name' => 'restore_offer',
                'label' => 'Can Restore An Offer',
                'created_at' => '2017-05-12 20:25:26',
                'updated_at' => '2017-05-12 20:25:26',
            ),
        ));
        
        
    }
}
