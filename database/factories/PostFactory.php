<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1,3),
        'title' => $faker->sentence(3),
        'content' => $faker->sentence(25)
    ];
});
