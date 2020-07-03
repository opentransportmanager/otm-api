<?php

declare(strict_types=1);

use App\Group;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/* @var Factory $factory */
$factory->define(
    Group::class,
    function (Faker $faker): array {
        return [
            'name' => $faker->safeColorName . ' ' . $faker->dayOfWeek,
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ];
    }
);
