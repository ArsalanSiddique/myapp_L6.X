<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProfile;
use Faker\Generator as Faker;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1,3),
        'phone' => random_int(10000000, 50000000),
        'photo' => $faker->name.'.jpg',
        'address' => $faker->sentence(2),
    ];
});
