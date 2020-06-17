<?php

declare(strict_types=1);

use App\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bouncer::allow('admin')->everything();
        Bouncer::allow('editor')->everything();
        Bouncer::forbid('editor')->toManage(User::class);
        Bouncer::forbid('editor')->toManage(Role::class);
        Bouncer::allow('user')->toOwn(User::class);
        Bouncer::allow('user')->to('view')->everything();
        Bouncer::forbid('user')->to('view', Role::class);
        Bouncer::forbid('user')->to('view', User::class);
        Bouncer::forbid('deactivated')->everything();
    }
}
