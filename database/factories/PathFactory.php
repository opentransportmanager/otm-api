<?php

declare(strict_types=1);

use App\Busline;
use App\Path;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/* @var Factory $factory */
$factory->define(
    Path::class,
    function (Faker $faker): array {
        return [
            'busline_id' => Busline::query()->inRandomOrder()->first()->id,
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ];
    }
);
