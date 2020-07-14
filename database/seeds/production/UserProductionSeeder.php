<?php

declare(strict_types=1);

use App\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class UserProductionSeeder extends Seeder
{
    public function run(): void
    {
        if (User::all()->isEmpty()) {
            $user = User::updateOrCreate(
                [
                    'name' => 'admin',
                    'email' => 'admin@example.com',
                    'password' => Hash::make('secret'),
                ]
            );
            Bouncer::assign('admin')->to($user);
        }
    }
}
