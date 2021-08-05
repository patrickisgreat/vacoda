<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

use App\Team;
use App\Role;
use App\Permission;

class CopyPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name'  => 'copy_offer',
                'label' => 'Can Copy Offer'
            ],
            [
                'name'  => 'copy_banner',
                'label' => 'Can Copy Banner'
            ],
        ];

        $roles = ['super_admin', 'company_administrator', 'reviewer', 'creator'];
        $teams = Team::all();

        foreach ($teams as $team) {
            foreach ($permissions as $permission) {
                $permission['team_id'] = $team->id;
                $newPermission = new Permission();
                $newPermission->fill($permission)->save();

                foreach ($roles as $roleLabel) {
                    $role = $team->roles()->where('label', $roleLabel)->first();

                    Log::info('$role');
                    Log::info($role);

                    if ($role) {
                        $role->givePermissionTo($newPermission);
                    }
                }
            }
        }
    }
}
