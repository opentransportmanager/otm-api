<?php

declare(strict_types=1);

use App\Course;
use App\Group;
use App\Path;
use Faker\Generator as Faker;

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Course::class, function (Faker $faker): array {
    return [
        'path_id' => Path::query()->inRandomOrder()->first()->id,
        'group_id' => Group::query()->inRandomOrder()->first()->id,
        'start_time' => $faker->time('H:i'),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
