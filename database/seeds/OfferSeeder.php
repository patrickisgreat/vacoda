<?php

use Illuminate\Database\Seeder;
use App\Offer;
use App\Team;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = Team::all();
        $offerCount = 1;

        foreach ($teams as $team) {
            for ($i=0; $i < 4; $i++) {
                $team->offers()->save(new Offer([
                    'creator_id'  => 2,
                    'owner_id'    => 2,
                    'team_id'     => $team->id,
                    'department_id' => $team->options()->first()->id,
                    'name'        => 'Seeded Test Offer ' . $offerCount,
                    'description' => 'In risus turpis, tempus ac mollis eget, cursus nec erat. Duis lorem arcu, consequat sed urna ac, bibendum suscipit purus.',
                    'start_date'  => '2016-11-17',
                    'end_date'    => '2016-11-18',
                ]));
                $offerCount++;
            }
        }
    }
}
