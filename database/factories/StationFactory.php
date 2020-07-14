<?php

declare(strict_types=1);

use App\Station;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/* @var Factory $factory */
$factory->define(
    Station::class,
    function (Faker $faker): array {
        return [
            'name' => $faker->unique()->streetName,
            'position' => [
                'lat' => $faker->latitude(51.161627025919280, 51.203827414778544),
                'lng' => $faker->longitude(16.128561608276385, 16.224074977425400),
            ],
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ];
    }
);
