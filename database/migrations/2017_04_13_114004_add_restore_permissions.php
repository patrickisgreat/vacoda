<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Permission;
use App\Role;
use App\Team;

class AddRestorePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissionsToCreate = [
            [
                'name'  => 'restore_banner',
                'label' => 'Can Restore A Banner'
            ],
            [
                'name'  => 'restore_offer',
                'label' => 'Can Restore An Offer'
            ],
        ];

        $team = Team::all();

        for ($i = 1; $i <= count($team); $i++) {
            // create permissions for each team
            foreach ($permissionsToCreate as $permission) {
                $permission['team_id'] = $i;
                $perm = new Permission();
                $perm->fill($permission)->save();
            }
        }

        $createdPermissions = Permission::where('name', 'restore_banner')
                                      ->orWhere('name', 'restore_offer')->get();

        $rolesToGivePermission = Role::where('name', 'Banner Approver')
                                   ->orWhere('name', 'Company Administrator')
                                   ->orWhere('name', 'Super Admin')
                                   ->orWhere('name', 'Reviewer')
                                   ->orWhere('name', 'Company Admin')->get();

        // add permissions to roles
        foreach ($rolesToGivePermission as $role) {
            foreach ($createdPermissions as $createdPermission) {
                if ($role->team_id === $createdPermission->team_id) {
                    $role->givePermissionTo($createdPermission);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
