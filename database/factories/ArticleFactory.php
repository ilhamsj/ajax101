<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $created_at = $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
    return [
        'title' => Str::title($faker->realText($maxNbChars = 100, $indexSize = 2)),
        'content' => $faker->realText($maxNbChars = 1000, $indexSize = 2),
        'updated_at' => $created_at,
        'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = $created_at),
    ];
});
