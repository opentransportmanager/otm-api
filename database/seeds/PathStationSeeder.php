<?php

declare(strict_types=1);

use App\Path;
use App\Station;
use Illuminate\Database\Seeder;

class PathStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stations = Station::all();

        Path::all()->each(function ($path) use ($stations): void {
            $path->stations()->attach(
                $stations->random(rand(8, 16))->pluck('id')->toArray()
            );
        });
    }
}
