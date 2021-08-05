<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // define teams for creation
        $teams = [
            [
                'name'        => 'Digital Additive',
                'description' => 'DA Admin Company Description'
            ],
            [
                'name'        => 'Demo',
                'description' => 'Demo Company Description'
            ],
            [
                'name'        => 'THD',
                'description' => 'The Home Depot'
            ],
        ];

        // create each team defined above
        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}
