<?php

use Illuminate\Database\Seeder;
use App\Team;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commonFields = [
            'password' => bcrypt('secret'), // temporary password
        ];

        // define DA users for creation
        $daUsers = [
            [
                'name'  => 'Ben Yarbrough',
                'email' => 'ben.yarbrough@digitaladditive.com'
            ],
            [
                'name'  => 'Maggie Martin',
                'email' => 'maggie.martin@digitaladditive.com'
            ],
            [
                'name'  => 'Zach Lang',
                'email' => 'zach.lang@digitaladditive.com'
            ],
            [
                'name'  => 'Patrick Bennett',
                'email' => 'patrick.bennett@digitaladditive.com'
            ],
            [
                'name'  => 'Alex Cobb',
                'email' => 'alex.cobb@digitaladditive.com'
            ],
            [
                'name'  => 'Claire Cadena',
                'email' => 'claire.cadena@digitaladditive.com'
            ],
            [
                'name'  => 'Kevin Moran',
                'email' => 'kevin.moran@digitaladditive.com'
            ],
            [
                'name'  => 'Roxana Shershin',
                'email' => 'roxana.shershin@digitaladditive.com'
            ],
            [
                'name'  => 'Abby Major',
                'email' => 'abby.major@digitaladditive.com'
            ],
            [
                'name'  => 'Jennie Woolley',
                'email' => 'jennie.woolley@digitaladditive.com'
            ],
        ];

        $da = Team::where('name', 'Digital Additive')->firstOrFail();
        // create each DA user defined above

        foreach ($daUsers as $k => $daUser) {
            $user = $daUser + $commonFields;
            $da->users()->save(new User($user));
            if ($k == 0) {
                $owner_user = User::where('name', $daUser['name'])->first();
                $da->owner_id = $owner_user->id;
                $da->save();
            }
        }

        // define demo users for creation
        $demoUsers = [
            [
                'name'  => 'Demo User',
                'email' => 'demo@example.com'
            ],
            [
                'name'  => 'Demo User Two',
                'email' => 'demo2@example.com'
            ],
        ];

        $demo = Team::where('name', 'Demo')->firstOrFail();

        // create each demo user defined above
        foreach ($demoUsers as $k => $demoUser) {
            $user = $demoUser + $commonFields;
            $demo->users()->save(new User($user));
            if ($k == 0) {
                $owner_user = User::where('name', $demoUser['name'])->first();
                $demo->owner_id = $owner_user->id;
                $demo->save();
            }
        }

        // define thd users for creation
        $thdUsers = [
            [
                'name'  => 'Werner Herzog',
                'email' => 'herzog@thd.com'
            ],
            [
                'name'  => 'Nicolas Kim Coppola',
                'email' => 'mr_loew@thd.com'
            ],
        ];

        $thd = Team::where('name', 'THD')->firstOrFail();

        // create each demo user defined above
        foreach ($thdUsers as $k => $thdUser) {
            $user = $thdUser + $commonFields;
            $thd->users()->save(new User($user));
            if ($k == 0) {
                $owner_user = User::where('name', $thdUser['name'])->first();
                $thd->owner_id = $owner_user->id;
                $thd->save();
            }
        }
    }
}
