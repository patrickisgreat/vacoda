<?php

$factory->define(App\Banner::class, function (Faker\Generator $faker) {

    $ctas = [
        'SHOP NOW >',
        'LEARN MORE >',
        'SHOP ALL >'
    ];

    $statuses = [
        "Draft",
        "Pending",
        "Approved",
        "Denied",
    ];

    // random start & end times
    $randomTime = $faker->unixTime();
    $start = date("Y-m-d H:i:s", $randomTime);
    $end = date("Y-m-d H:i:s", $randomTime + 86400 * 7); // 7 days after start

    return [
        'creator_id'         => 1,
        'name'               => $faker->catchPhrase,
        'description'        => $faker->bs,
        'headline'           => $faker->catchPhrase,
        'headline_font_size' => rand(16, 100),
        'body'               => $faker->bs,
        'body_font_size'     => rand(10, 30),
        'cta'                => $faker->randomElement($ctas),
        'url'                => 'http://example.com',
        'status'             => $faker->randomElement($statuses),
        'image_alt'          => $faker->bs,
        'start_date'         => $start,
        'end_date'           => $end,
        'export_image'       => 0
    ];

});