<?php

declare(strict_types=1);

use App\Station;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        factory(Station::class, 50)->create()->each(function (Station $station): void {
            $station->save();
        });
    }
}
