<?php

declare(strict_types=1);

use App\Path;
use Illuminate\Database\Seeder;

class PathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        factory(Path::class, 100)->create()->each(function ($group): void {
            $group->save(factory(Path::class)->make()->toArray());
        });
    }
}
