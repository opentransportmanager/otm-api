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
        $station_ids = Station::all()->pluck('id');

        Path::all()->each(
            function (Path $path) use ($station_ids): void {
                $random_station_ids = $station_ids->random(rand(3, 5));
                $path->stations()->attach(
                    $random_station_ids->pop(),
                    ['travel_time' => 0]
                );
                foreach ($random_station_ids as $station_id) {
                    $path->stations()->attach(
                        $station_id,
                        ['travel_time' => rand(1, 10)]
                    );
                }
            }
        );
    }
}
