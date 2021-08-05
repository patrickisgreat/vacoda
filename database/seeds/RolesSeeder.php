<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\User;
use App\Team;
use Illuminate\Support\Facades\Log;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daPermissions = [
            [
                'name'  => 'list_template',
                'label' => 'Can View Templates List' //DA ONLY
            ],
            [
                'name'  => 'update_template',
                'label' => 'Can Edit Templates' //DA ONLY
            ],
            [
                'name'  => 'store_template',
                'label' => 'Can Create Templates' //DA ONLY
            ],
            [
                'name'  => 'destroy_template',
                'label' => 'Can Archive Templates' //DA ONLY
            ],
            [
                'name'  => 'view_companies',
                'label' => 'Can View Companies' //DA ONLY
            ],
            [
                'name'  => 'update_company',
                'label' => 'Can Edit Companies' //DA ONLY
            ],
            [
                'name'  => 'store_company',
                'label' => 'Can Create Companies' //DA ONLY
            ],
            [
                'name'  => 'destroy_company',
                'label' => 'Can Archive Companies' //DA ONLY
            ],
            [
                'name'  => 'assign_companies',
                'label' => 'Can Assign Companies' //DA ONLY
            ],
            [
                'name'  => 'list_option',
                'label' => 'Can List Options' //DA ONLY
            ],
            [
                'name'  => 'show_option',
                'label' => 'Can View Options' //DA ONLY
            ],
            [
                'name'  => 'update_option',
                'label' => 'Can Edit Options' //DA ONLY
            ],
            [
                'name'  => 'destroy_option',
                'label' => 'Can Archive Options' //DA ONLY
            ],
            [
                'name'  => 'store_option',
                'label' => 'Can Create Options' //DA ONLY
            ],
            [
                'name'  => 'list_optiontype',
                'label' => 'Can List Options' //DA ONLY
            ],
            [
                'name'  => 'show_optiontype',
                'label' => 'Can View Options' //DA ONLY
            ],
            [
                'name'  => 'update_optiontype',
                'label' => 'Can Edit Options' //DA ONLY
            ],
            [
                'name'  => 'destroy_optiontype',
                'label' => 'Can Archive Options' //DA ONLY
            ],
            [
                'name'  => 'store_optiontype',
                'label' => 'Can Create Options' //DA ONLY
            ],
            [
                'name'  => 'all_mighty',
                'label' => 'Can Do Everything' //DA ONLY
            ],
            [
                'name'  => 'show_user',
                'label' => 'Can View Users' //DA ONLY
            ],
            [
                'name'  => 'edit_approved_banner',
                'label' => 'Can Edit and Approved Banner'
            ],
        ];

        $permissions = [
            [
                'name'  => 'list_role',
                'label' => 'Can View Roles List'
            ],
            [
                'name'  => 'show_role',
                'label' => 'Can View A Role'
            ],
            [
                'name'  => 'update_role',
                'label' => 'Can Edit Roles'
            ],
            [
                'name'  => 'store_role',
                'label' => 'Can Create Roles'
            ],
            [
                'name'  => 'destroy_role',
                'label' => 'Can Archive Roles'
            ],
            [
                'name'  => 'show_dashboard',
                'label' => 'Can View Dashboard'
            ],
            [
                'name'  => 'list_banner',
                'label' => 'Can View Banners List'
            ],
            [
                'name'  => 'show_banner',
                'label' => 'Can View Banners'
            ],
            [
                'name'  => 'search_banner',
                'label' => 'Can Search Banners'
            ],
            [
                'name'  => 'update_banner',
                'label' => 'Can Edit Banners'
            ],
            [
                'name'  => 'store_banner',
                'label' => 'Can Create Banners'
            ],
            [
                'name'  => 'destroy_banner',
                'label' => 'Can Archive Banners'
            ],
            [
                'name'  => 'approve_banner',
                'label' => 'Can Approve Banners'
            ],
            [
                'name'  => 'deny_banner',
                'label' => 'Can Deny Banners'
            ],
            [
                'name'  => 'export_banner',
                'label' => 'Can Export Banners'
            ],
            [
                'name'  => 'list_offer',
                'label' => 'Can View Offers List'
            ],
            [
                'name'  => 'show_offer',
                'label' => 'Can View Offers'
            ],
            [
                'name'  => 'update_offer',
                'label' => 'Can Edit Offers'
            ],
            [
                'name'  => 'store_offer',
                'label' => 'Can Create Offers'
            ],
            [
                'name'  => 'destroy_offer',
                'label' => 'Can Archive Offers'
            ],
            [
                'name'  => 'export_offer',
                'label' => 'Can Export Offers'
            ],
            [
                'name'  => 'import_offer',
                'label' => 'Can Import Offers'
            ],
            [
                'name'  => 'list_template',
                'label' => 'Can View Templates List'
            ],
            [
                'name'  => 'show_template',
                'label' => 'Can View Templates'
            ],
            [
                'name'  => 'list_theme',
                'label' => 'Can View Theme List'
            ],
            [
                'name'  => 'update_theme',
                'label' => 'Can Edit Themes'
            ],
            [
                'name'  => 'store_theme',
                'label' => 'Can Create Themes'
            ],
            [
                'name'  => 'destroy_theme',
                'label' => 'Can Archive Themes'
            ],
            [
                'name'  => 'view_themes',
                'label' => 'Can View Themes'
            ],
            [
                'name'  => 'list_user',
                'label' => 'Can View User List'
            ],
            [
                'name'  => 'show_user',
                'label' => 'Can View Users'
            ],
            [
                'name'  => 'update_user',
                'label' => 'Can Edit Users'
            ],
            [
                'name'  => 'store_user',
                'label' => 'Can Create Users'
            ],
            [
                'name'  => 'destroy_user',
                'label' => 'Can Archive Users'
            ],
            [
                'name'  => 'list_option',
                'label' => 'Can List Options'
            ],
            [
                'name'  => 'show_option',
                'label' => 'Can View Options'
            ],
            [
                'name'  => 'update_option',
                'label' => 'Can Edit Options'
            ],
            [
                'name'  => 'destroy_option',
                'label' => 'Can Archive Options'
            ],
            [
                'name'  => 'store_option',
                'label' => 'Can Create Options'
            ],
            [
                'name'  => 'list_optiontype',
                'label' => 'Can List Options'
            ],
            [
                'name'  => 'show_optiontype',
                'label' => 'Can View Options'
            ],
            [
                'name'  => 'update_optiontype',
                'label' => 'Can Edit Options'
            ],
            [
                'name'  => 'destroy_optiontype',
                'label' => 'Can Archive Options'
            ],
            [
                'name'  => 'store_optiontype',
                'label' => 'Can Create Options'
            ],
            [
                'name'  => 'edit_approved_banner',
                'label' => 'Can Edit and Approved Banner'
            ],
        ];

        $daRoles = [
            [
                'name'  => 'super_admin',
                'label' => 'Super Admin' //DA ONLY
            ]
        ];

        $roles = [
            [
                'name'  => 'banner_approver',
                'label' => 'Can Approve Banners'
            ],
            [
                'name'  => 'banner_creator_editor',
                'label' => 'Can Create or Edit Banners'
            ],
            [
                'name'  => 'viewer_role',
                'label' => 'Can View Stuff'
            ],
            [
                'name'  => 'company_admin',
                'label' => 'Company Administrator'
            ],
        ];

        $team = Team::all();
        for ($i = 1; $i <= count($team); $i++) {
            //create permission first
            foreach ($permissions as $permission) {
                $permission['team_id'] = $i;
                $perm = new Permission();
                $perm->fill($permission)->save();
            }

            foreach ($roles as $role) {
                $role['team_id'] = $i;
                $newRole = new Role();
                $newRole->fill($role)->save();
                //give super admin role all permissions
                if ($role['name'] == 'super_admin') {
                    $allPermissions = Permission::all();

                    foreach ($allPermissions as $permission) {
                        $newRole->givePermissionTo($permission);
                    }
                }
            }
        }

        //DA ONLY PERMISSIONS
        foreach ($daPermissions as $daPermission) {
            $daPermission['team_id'] = '1';
            $perm = new Permission();
            $perm->fill($daPermission)->save();
        }

        //DA ONLY ROLES
        foreach ($daRoles as $daRole) {
            $daRole['team_id'] = '1';
            $newRole = new Role();
            $newRole->fill($daRole)->save();
            //give super admin role all permissions
//            if ($daRole['name'] == 'super_admin')
//            {
//                $allPermissions = Permission::all();
//
//                foreach ($allPermissions as $permission)
//                {
//                    $newRole->givePermissionTo($permission);
//                }
//            }
        }

        //set da super admin as origin super admin
//        $daSuperAdmin = User::where('name', '=', 'DA Super Admin')->firstOrFail();
//        $daSuperAdmin->actAs('super_admin');

    }
}
