<?php

declare(strict_types=1);

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run(): void
    {
        $items = [
            ['name' => 'admin', 'email' => 'admin@example.com', 'password' => Hash::make('admin')]
        ];
        foreach ($items as $item){
            User::updateOrCreate(['email' => $item['email']], $item);
        }
    }
}
