<?php

use Illuminate\Database\Seeder;
use App\OptionType;
use App\Option;
use App\Team;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $option_types = collect([
            [
                "name"       => "Department",
                "creator_id" => 1
            ],

        ]);

        $options = collect([
            [
                "name"           => "D21 - Lumber",
                "abbreviation"   => "D21",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D22 - Building Materials",
                "abbreviation"   => "D22",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D23 - Flooring",
                "abbreviation"   => "D23",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D24 - Paint",
                "abbreviation"   => "D24",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D25H - Hardware",
                "abbreviation"   => "D24",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D25T - Tools",
                "abbreviation"   => "D25T",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D26P - Plumbing",
                "abbreviation"   => "D26P",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D27E - Electrical",
                "abbreviation"   => "D26P",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D27L - Lighting",
                "abbreviation"   => "D27L",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D28I - Lawn and Garden Indoor",
                "abbreviation"   => "D28I",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D28O - Lawn and Garden Outdoor",
                "abbreviation"   => "D28O",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D29A - Appliances",
                "abbreviation"   => "D29A",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D29B – Kitchen & Bath",
                "abbreviation"   => "D29B",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D30 - Millwork",
                "abbreviation"   => "D30",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "D59 - Interior Decor",
                "abbreviation"   => "D59",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ],
            [
                "name"           => "Credit",
                "abbreviation"   => "Credit",
                "team_id"        => 1,
                "option_type_id" => 1,
                "creator_id"     => 1
            ]
        ]);

        $option_types->each(function ($option_type) {
            $new_opt_type = new OptionType([
                'name'       => $option_type['name'],
                'creator_id' => $option_type['creator_id'],
                'team_id'    => 1,
            ]);
            $new_opt_type->save();
        });

        $options->each(function ($option) {
            $new_option = new Option([
                'name'           => $option['name'],
                'abbreviation'   => $option['abbreviation'],
                'team_id'        => $option['team_id'],
                'option_type_id' => $option['option_type_id'],
                'creator_id'     => $option['creator_id']
            ]);
            $new_option->save();
        });

    }
}
