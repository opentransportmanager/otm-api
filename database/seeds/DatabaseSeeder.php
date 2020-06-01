<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (App::environment('local', 'development', 'staging')) {
            $this->call([
            UsersTableSeeder::class,
            BuslineSeeder::class,
            StationSeeder::class,
            GroupSeeder::class,
            PathSeeder::class,
            CourseSeeder::class,
            PathStationSeeder::class,
            ]);
        }
    }
}
