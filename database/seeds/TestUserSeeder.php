<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Team;
use App\User;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commonFields = [
            'password' => bcrypt('secret'),
        ];

        // define DA test users for creation
        $daUsers = [
            [
                'name'  => 'DA Reviewer',
                'email' => 'da-reviewer@example.com'
            ],
            [
                'name'  => 'DA Creator',
                'email' => 'da-creator@example.com'
            ],
            [
                'name'  => 'DA Viewer',
                'email' => 'da-viewer@example.com'
            ],
            [
                'name'  => 'DA Company Admin',
                'email' => 'da-company-admin@example.com'
            ],
        ];

        $da = Team::where('name', 'Digital Additive')->firstOrFail();

        foreach ($daUsers as $daUser) {
            $user = $daUser + $commonFields;
            $newUser = $da->users()->save(new User($user));

            $roleName = str_replace("DA ", "", $user['name']);
            $roleToAssign = $da->roles()->where('name', $roleName)->firstOrFail();

            $newUser->roles()->save($roleToAssign);
        }
    }
}
