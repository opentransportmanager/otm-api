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
        if (App::environment('local', 'testing')) {
            $this->call(
                [
                    BouncerSeeder::class,
                    UsersTableSeeder::class,
                ]
            );
        }

        if (App::environment('testing')) {
            $this->call(
                [
                    BuslineSeeder::class,
                    StationSeeder::class,
                    GroupSeeder::class,
                    PathSeeder::class,
                    CourseSeeder::class,
                    PathStationSeeder::class,
                ]
            );
        }

        if (App::environment('production', 'staging')) {
            $this->call(
                [
                    PolicyProductionSeeder::class,
                    UserProductionSeeder::class,
                ]
            );
        }
    }
}
