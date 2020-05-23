<?php

declare(strict_types=1);

use App\Busline;
use App\Station;
use Illuminate\Database\Seeder;

class BuslineStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stations = Station::all();

        Busline::all()->each(function ($busline) use ($stations) {
            $busline->stations()->attach(
                $stations->random(rand(8, 16))->pluck('id')->toArray()
            );
        });
    }
}
