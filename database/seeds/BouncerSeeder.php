<?php

declare(strict_types=1);

use App\User;
use App\Role;
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
        Bouncer::forbid('deactivated')->everything();
    }
}
