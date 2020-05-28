<?php

declare(strict_types=1);

use App\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        factory(Group::class, 20)->create()->each(function (Group $group): void {
            $group->save();
        });
    }
}
