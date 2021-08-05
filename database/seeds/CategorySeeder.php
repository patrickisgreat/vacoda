<?php

use Illuminate\Database\Seeder;
use App\Program;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $thdPrograms = [
            [
                "name"       => "Shopper Browser / Promo",
                "categories" => [
                    "BR_ACAIRQUALITY",
                    "BR_ACANDFANS",
                    "BR_AIRCOMPRESSOR",
                    "BR_BATHACCESS",
                    "BR_BATHFAUCETS",
                    "BR_BATHFIXTURES",
                    "BR_BATHVANITIES",
                    "BR_BUILDHARDWARE",
                    "BR_CARPET",
                    "BR_CEILINGFANS",
                    "BR_CHAINSAW",
                    "BR_COOK",
                    "BR_COUNTERTOP",
                    "BR_CUSTOMCABINETS",
                    "BR_DECORFURNITURE",
                    "BR_DECORHOME",
                    "BR_DECORWALL",
                    "BR_DECORWINDOW",
                    "BR_DISH",
                    "BR_DRSLOCKS",
                    "BR_DRSWINEXTDOORS",
                    "BR_DRSWINGARAGE",
                    "BR_DRSWININTDOORS",
                    "BR_DRSWINPATIO",
                    "BR_DRSWINWINDOWS",
                    "BR_ELECTRICCIRCUIT",
                    "BR_ELECTRICCONDUIT",
                    "BR_ELECTRICCONTROL",
                    "BR_ELECTRICCORDS",
                    "BR_ELECTRICDEVICES",
                    "BR_ELECTRICSAFETY",
                    "BR_ELECTRICTOOLS",
                    "BR_ELECTRICWIRE",
                    "BR_FASTENHARDWARE",
                    "BR_FASTERNTOOL",
                    "BR_FERTILIZER",
                    "BR_FRIDGE",
                    "BR_GENERATORS",
                    "BR_GRILLACCESS",
                    "BR_GRILLS",
                    "BR_HANDTOOL",
                    "BR_HARDSCAPE",
                    "BR_HEATAIRREGULATE",
                    "BR_HEATFIREPLACES",
                    "BR_HEATPORTABLE",
                    "BR_HOLIDAYDECOR",
                    "BR_HOTTUBS",
                    "BR_HOUSEWARES",
                    "BR_HRDFLOORCARE",
                    "BR_HRDFLOORLAMINATE",
                    "BR_HRDFLOORLUXPLANK",
                    "BR_HRDFLOORTILE",
                    "BR_HRDFLOORTOOLS",
                    "BR_HRDFLOORVINYL",
                    "BR_HRDFLOORWOOD",
                    "BR_INSULATIONBUILDING",
                    "BR_KITCHENCABINETS",
                    "BR_KITCHENDISPOSERS",
                    "BR_KITCHENELECTRICS",
                    "BR_KITCHENFAUCETS",
                    "BR_KITCHENSINKS",
                    "BR_LAUNDRY",
                    "BR_LAWNCHEMICAL",
                    "BR_LAWNTOOL",
                    "BR_LAWNWATERING",
                    "BR_LIGHTINGACCENT",
                    "BR_LIGHTINGBULBS",
                    "BR_LIGHTINGCOMMERCIAL",
                    "BR_LIGHTINGEXTERIOR",
                    "BR_LIGHTINGINTERIOR",
                    "BR_LIGHTINGLANDSCAPE",
                    "BR_LIGHTINGRECESSED",
                    "BR_LIGHTINGSECURITY",
                    "BR_LIVEGOOD",
                    "BR_MICROWAVES",
                    "BR_OUTDOORSTORAGE",
                    "BR_PAINTEXT",
                    "BR_PAINTINT",
                    "BR_PAINTPREP",
                    "BR_PAINTSPRAYER",
                    "BR_PAINTTOOLS",
                    "BR_PATIO",
                    "BR_PLANTERS",
                    "BR_PLUMBINGHEATING",
                    "BR_PLUMBINGIRRIGATION",
                    "BR_PLUMBINGPIPE",
                    "BR_PLUMBINGPUMPS",
                    "BR_PLUMBINGREPAIR",
                    "BR_PNEUMATIC",
                    "BR_PORTABLEYARD",
                    "BR_POWERACCTOOL",
                    "BR_POWERTOOL",
                    "BR_PRESSUREWASHER",
                    "BR_PUSHMOWER",
                    "BR_RIDINGMOWER",
                    "BR_RUGSAREA",
                    "BR_SAFETY",
                    "BR_SHEDSTRUCTURES",
                    "BR_SNOWBLOWER",
                    "BR_SOILANDMULCH",
                    "BR_SPRAYPAINT",
                    "BR_STORAGEGARAGE",
                    "BR_STORAGEGENERAL",
                    "BR_TOOLSTORAGE",
                    "BR_WATERGARDENING",
                    "BR_WATERHEATERS",
                    "BR_WATERHEATERSTRT",
                    "BR_WETDRYVAC",

                ]
            ],
            [
                "name"       => "Installation Services",
                "categories" => [
                    "IS_WINDOWS",
                    "IS_HARD_WINDOW",
                    "IS_WATERHTR",
                    "IS_INTERIOR_SHUTTERS",
                    "IS_HARDWOOD_FLOORING",
                    "IS_WATERTRMT",
                    "IS_VINYL_FLOORING",
                    "IS_INTERIOR_DOOR",
                    "IS_BATH_INSTLL",
                    "IS_COUNTERTOPS",
                    "IS_ROOFING",
                    "IS_FENCING",
                    "IS_CABINET_REFACING",
                    "IS_TILE_INSTLL",
                    "IS_CARPET_FLOORING",
                    "IS_HVAC",
                    "IS_PATIO_DOOR",
                    "IS_GUTTERS",
                    "IS_INSTL_STRUCTURES",
                    "IS_LAMINATE_FLOORING",
                    "IS_KITCHEN_INSTLL",
                    "IS_GARAGE_DOOR_INSTL",
                    "IS_DOOR_INSTL",
                    "IS_SOLAR_INSTL",
                    "IS_INSTL_GENERATORS",
                ]
            ],
            [
                "name"       => "Garden Club",
                "categories" => [
                    "GC_CHAINSAWS",
                    "GC_CHEMICALS",
                    "GC_DECOR_WALL",
                    "GC_DECOR_WINDOW",
                    "GC_DRS_WNDWS_GARAG",
                    "GC_DRS_WNDWS_PATIO",
                    "GC_EXT_PAINT",
                    "GC_EXT_STNS",
                    "GC_FANS_OUTDOOR",
                    "GC_FERTILIZER",
                    "GC_GENERATORS",
                    "GC_GRILLS",
                    "GC_HARDSCAPES",
                    "GC_HEAT",
                    "GC_IRRIGATION_WATERING",
                    "GC_KITCHEN",
                    "GC_LAND_LIGHTING",
                    "GC_LAWN_TOOL",
                    "GC_LIGHT_EXT_SEC",
                    "GC_LIVE_GOOD",
                    "GC_MOWERS_RIDERS",
                    "GC_OUTDOOR_LIGHTING",
                    "GC_PATIO",
                    "GC_PLANTERS",
                    "GC_PRESS_WSHR",
                    "GC_RUGS_OUTDOOR",
                    "GC_SOIL_MULCH",
                    "GC_STORAGE_OUTDOOR",
                    "GC_WATER_GARDEN",
                    "GC_MOWERS_WALKS",
                    "GC_DRS_WNDWS_EXT",
                    "GC_DRS_WNDWS_WNDWS",
                    "GC_OUTDOOR_FIREPLACES",
                    "GC_LAWNWATERING",
                    "GC_SHEDSTRUCTURES",
                    "GC_STORAGEGARAGE",
                    "GC_TOOLS_HARDWARE",
                    "GC_PORTABLE_POWER",
                    "GC_SNOW",
                ]
            ],
            [
                "name"       => "Abandon Cart / Browse Retargeting",
                "categories" => [
                    "AC_DYN2",
                    "APP_DYN2",
                    "BATH_DYN2",
                    "BATHFAUCETS_DYN2",
                    "CARPET_DYN2",
                    "CHOSNOW_DYN2",
                    "DECOR_DYN2",
                    "DOOR_WINDOW_DYN2",
                    "ELECTRIC_DYN2",
                    "FANS_DYN2",
                    "FLCARE_DYN2",
                    "GEN_DYN2",
                    "GRILL_DYN2",
                    "HEAT_DYN2",
                    "HOLIDAY_DYN2",
                    "HRDFLOORLAMINATE_DYN2",
                    "HRDFLOORTILE_DYN2",
                    "HRDFLOORVINYL_DYN2",
                    "HRDFLOORWOOD_DYN2",
                    "HVAC_DYN2",
                    "INSULATION_DYN2",
                    "KITCHEN_DYN2",
                    "KITCHENFAUCETS_DYN2",
                    "LAWN_GARDEN_DYN2",
                    "LIGHTING_DYN2",
                    "MOWER_DYN2",
                    "ORG_DYN2",
                    "OUTDOOR_DYN2",
                    "PAINT_DYN2",
                    "PLUMBING_DYN2",
                    "RET_ALL_OTHER_DYN2",
                    "RUGS_DYN2",
                    "SHEDS_DYN2",
                    "TOOLS_DYN2",
                    "WTRHTR_DYN2",
                    "YARDPWR_DYN2",
                ]
            ],
        ];

        foreach ($thdPrograms as $program) {
            $newProgram = new Program([
                'team_id' => 3,
                'name'    => $program['name']
            ]);

            $newProgram->save();

            foreach ($program['categories'] as $category) {
                $newCategory = new Category([
                    'program_id' => $newProgram->id,
                    'cell_label' => $category,
                    'team_id'    => 3,
                ]);
                $newCategory->save();
            }
        }


        $daPrograms = [
            [
                "name"       => "Promo",
                "categories" => [
                    "Shoes",
                    "Clothing",
                    "Accessories",
                    "Chalk",
                ]
            ],
            [
                "name"       => "Abandon Cart",
                "categories" => [
                    "Shoes",
                    "Clothing",
                    "General",
                ]
            ],
            [
                "name"       => "Newsletter",
                "categories" => [
                    "General",
                    "Sponsored athletes",
                    "Store openings",
                    "Clothing",
                ]
            ],
            [
                "name"       => "Transactional",
                "categories" => [
                    "Purchases",
                    "Returns",
                    "Exchanges",
                ]
            ],
        ];

        foreach ($daPrograms as $program) {
            $newProgram = new Program([
                'team_id' => 1,
                'name'    => $program['name']
            ]);

            $newProgram->save();

            foreach ($program['categories'] as $category) {
                $newCategory = new Category([
                    'program_id' => $newProgram->id,
                    'cell_label' => $category,
                    'team_id'    => 1,
                ]);
                $newCategory->save();
            }
        }
    }
}
