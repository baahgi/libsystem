<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'isbn' => Str::random(10),
        'category_id' => random_int(1, 4),
        'title' => $faker->words(5),
        'author' => $faker->name,
        'publisher' => $faker->firstName,
        'published_date' => Carbon::now(),
    ];
});
