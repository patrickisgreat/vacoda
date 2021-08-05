<?php

$factory->define(App\Layout::class, function (Faker\Generator $faker) {
    return [
        'creator_id' => 1,
        'name' => $faker->domainWord,
        'description' => $faker->paragraphs($nb = 1, $asText = false),
        'html'        => file_get_contents(realpath(__DIR__ . '../seeds/layouts/html/100.html')),
        'css'         => file_get_contents(realpath(__DIR__ . '../seeds/layouts/css/responsive.css')),
    ];
});