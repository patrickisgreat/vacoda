<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
//
//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\Banner::class, function (Faker\Generator $faker) {
    $ctas = [
        'SHOP NOW >',
        'LEARN MORE >',
        'SHOP ALL >'
    ];

    $statuses = [
        Status::Draft,
        Status::Pending,
        Status::Approved,
        Status::Denied,
    ];

   return [
        'creator_id'         => 2,
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
   ];
});
