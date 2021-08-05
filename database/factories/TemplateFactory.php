<?php

$factory->define(App\Template::class, function (Faker\Generator $faker) {

    $desktopWidths = [362, 600, 724];
    $mobileWidths = [320, 362];

    return [
        'name'          => $faker->catchPhrase,
        'description'   => $faker->bs,
        'html'          => $faker->randomHtml(rand(2, 5),rand(2, 5)),
        'has_cta'       => $faker->boolean(),
        'width_desktop' => $faker->randomElement($desktopWidths),
        'width_mobile'  => $faker->randomElement($mobileWidths),
    ];

});