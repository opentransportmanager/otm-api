<?php

declare(strict_types=1);

use App\Busline;
use Illuminate\Database\Seeder;

class BuslineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        factory(Busline::class, 50)->create()->each(function ($busline): void {
            $busline->save();
        });
    }
}
