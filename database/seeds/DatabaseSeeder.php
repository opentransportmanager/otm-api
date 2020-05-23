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
        $this->call(BuslineSeeder::class);
        $this->call(StationSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(BuslineStationSeeder::class);
    }
}
