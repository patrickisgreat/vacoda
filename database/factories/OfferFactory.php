<?php

$factory->define(App\Offer::class, function (Faker\Generator $faker) {

	// random start & end times
	$randomTime = $faker->unixTime();
    $start = date("Y-m-d H:i:s", $randomTime);
    $end = date("Y-m-d H:i:s", $randomTime + 86400 * 7); // 7 days after start

	return [
        'creator_id'         => 1,
        'owner_id'           => 1,
        'name'        		 => $faker->catchPhrase,
        'description'        => $faker->bs,
        'legal_display_copy' => $faker->bs,
        'start_date'         => $start,
        'end_date'           => $end,
    ];
    
});