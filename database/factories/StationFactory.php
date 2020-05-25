<?php

declare(strict_types=1);

use App\Station;
use Faker\Generator as Faker;

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Station::class, function (Faker $faker): array {
    return [
        'name' => $faker->unique()->streetName,
        'position' => [
            'lat' => $faker->latitude,
            'lng' => $faker->longitude,
        ],
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
