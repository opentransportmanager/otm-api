<?php

declare(strict_types=1);

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;

class RegistrationService
{
    public function registerUser(array $input): object
    {
        $validatedData = $input->validated();

        return User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);
    }
}
