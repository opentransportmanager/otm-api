<?php

declare(strict_types=1);

use App\Busline;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/* @var Factory $factory */
$factory->define(
    Busline::class,
    function (Faker $faker): array {
        return [
            'number' => $faker->unique()->numberBetween(1, 100) . $faker->randomLetter,
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ];
    }
);
