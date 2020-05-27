<?php

declare(strict_types=1);

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;

class RegistrationService
{
    public function registerUser(array $input): object
    {
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password'])
        ]);
    }
}
