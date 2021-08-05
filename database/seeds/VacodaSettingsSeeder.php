<?php

use Illuminate\Database\Seeder;
use App\VacodaSettings;
use App\Team;

class VacodaSettingsSeeder extends Seeder
{
    /**
     * Create default settings for all teams
     *
     * @return void
     */
    public function run()
    {
        $teams = Team::all();

        foreach ($teams as $team) {
            $settings = new VacodaSettings([
                'team_id' => $team->id,
                'active_date_precedence' => 'banner',
            ]);

            $settings->save();
        }
    }
}
