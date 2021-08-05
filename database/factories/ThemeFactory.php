<?php

$factory->define(App\Theme::class, function (Faker\Generator $faker) {
    return [
        'name'                 => $faker->catchPhrase,
        'description'          => $faker->bs,
        'font_color'           => $faker->hexColor,
        'font_color_secondary' => $faker->hexColor,
        'cta_font_color'       => $faker->hexColor,
        'cta_bg_color'         => $faker->hexColor,
        'background_color'     => $faker->hexColor,
    ];
});