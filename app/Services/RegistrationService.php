<?php

declare(strict_types=1);

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;

class RegistrationService
{
    public function registerUser(array $input): User
    {
        $user = [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password'])
        ];

        $createdUser = User::create($user);
        $createdUser->assign('user');
        return ($createdUser);
    }
}
