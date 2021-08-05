<?php

use Illuminate\Support\Facades\Crypt;

$factory->define(App\Impression::class, function (Faker\Generator $faker) {
    return [
        'SentCount' => $faker->SentCount,
        'OpenCount' => $faker->OpenCount,
        'ClickCount' => $faker->ClickCount
    ];
});