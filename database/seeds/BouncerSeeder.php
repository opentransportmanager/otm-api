<?php

declare(strict_types=1);

use App\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\Bouncer;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bouncer::allow('admin')->everything();
        Bouncer::allow('dispatcher')->everything();
        Bouncer::forbid('dispatcher')->toManage(User::class);
        Bouncer::forbid('dispatcher')->toManage(Bouncer::class);
        Bouncer::forbid('deactivated')->everything();
    }
}
