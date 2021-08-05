<?php

$factory->define(App\Team::class, function (Faker\Generator $faker) {
    return [
        'owner_id' => 1,
        'name' => $faker->company,
        'description' => 'yet another fake company',
    ];
});