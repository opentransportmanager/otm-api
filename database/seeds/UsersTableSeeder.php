<?php

declare(strict_types=1);

use App\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['name' => 'admin', 'email' => 'admin@example.com', 'password' => Hash::make('admin')],
            ['name' => 'editor', 'email' => 'editor@example.com', 'password' => Hash::make('editor')],
            ['name' => 'user', 'email' => 'user@example.com', 'password' => Hash::make('user')],
            ['name' => 'deactivated', 'email' => 'deactivated@example.com', 'password' => Hash::make('deactivated')],
        ];
        foreach ($items as $item) {
            $user = User::updateOrCreate(['email' => $item['email']], $item);
            Bouncer::assign($item['name'])->to($user);
        }
    }
}
