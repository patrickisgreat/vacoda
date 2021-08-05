<?php

use Illuminate\Database\Seeder;

use App\Theme;
use App\Team;

class ThemeSeeder extends Seeder
{
    /**
     * Create 4 Themes for each Team.
     *
     * @return void
     */
    public function run()
    {
        $teams = Team::all();
        //----------------------
        // Global Themes
        //----------------------

        foreach ($teams as $k => $team) {
            $team_users = $team->users()->get();
            $team->themes()->save(new Theme([
                'creator_id'           => $team_users[0]->id,
                'name'                 => 'Black & White',
                'font_color'           => '#000000',
                'font_color_secondary' => '#333333',
                'cta_font_color'       => '#000000',
                'cta_bg_color'         => 'transparent',
                'background_color'     => '#FFFFFF',
            ]));
        }


        //----------------------
        // THD Themes
        //----------------------

        $thd = Team::where('name', 'THD')->firstOrFail();
        $thd_users = $thd->users()->get();
        //get team owner

        $thd->themes()->save(new Theme([
            'creator_id'           => $thd_users[0]->id,
            'name'                 => 'Orange & Beige',
            'font_color'           => '#F96302',
            'font_color_secondary' => '#000000',
            'cta_font_color'       => '#F96302',
            'cta_bg_color'         => 'transparent',
            'background_color'     => '#FFF4ED',
        ]));

        $thd->themes()->save(new Theme([
            'creator_id'           => $thd_users[0]->id,
            'name'                 => 'Black & Goldenrod',
            'font_color'           => '#000000',
            'font_color_secondary' => '#000000',
            'cta_font_color'       => '#000000',
            'cta_bg_color'         => 'transparent',
            'background_color'     => '#FFC20E',
        ]));

        $thd->themes()->save(new Theme([
            'creator_id'           => $thd_users[0]->id,
            'name'                 => 'White & Orange',
            'font_color'           => '#FFFFFF',
            'font_color_secondary' => '#FFFFFF',
            'cta_font_color'       => '#FFFFFF',
            'cta_bg_color'         => 'transparent',
            'background_color'     => '#F96302',
        ]));

        $thd->themes()->save(new Theme([
            'creator_id'           => $thd_users[0]->id,
            'name'                 => 'Red & White',
            'font_color'           => '#FFFFFF',
            'font_color_secondary' => '#FFFFFF',
            'cta_font_color'       => '#FFFFFF',
            'cta_bg_color'         => 'transparent',
            'background_color'     => '#b42c31',
        ]));

        //$thd->themes()->save(new Theme([
        //    'name' => 'Red, White & Green',
        //    'font_color' => '#FFFFFF',
        //    'font_color_secondary' => '#FFFFFF',
        //    'cta_font_color' => '#0BB14D',
        //    'cta_bg_color' => '#B42C31',
        //    'background_color' => '#B42C31',
        //]));
    }
}
