<?php

$factory->define(App\OptionType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->catchPhrase,
    ];
});