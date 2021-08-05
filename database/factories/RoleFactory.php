<?php

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'team_id' => 1,
        'name' => $faker->domainWord,
    ];
});