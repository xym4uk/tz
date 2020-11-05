<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Gbr;
use Faker\Generator as Faker;

$factory->define(Gbr::class, function (Faker $faker) {
    $id = $faker->unique()->randomNumber(2);
    return [
        'Group_id' => $id,
        'TableID' => (string) $id,
        'Description' => $faker->words(4, true),
        'category' => $faker->numberBetween(1,100),
        'status_id' => $faker->randomDigitNotNull,
        'reason' => $faker->randomElement(['Свободна', 'На выезде', 'Осмотр объекта']),
    ];
});
