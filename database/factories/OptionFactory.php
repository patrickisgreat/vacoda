<?php

$factory->define(App\Option::class, function (Faker\Generator $faker) {
    return [
        'name'         => $faker->catchPhrase,
        'abbreviation' => $faker->slug($nbWords = 2, $variableNbWords = true),
    ];
});