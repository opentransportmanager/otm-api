<?php

declare(strict_types=1);

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;
use Silber\Bouncer\BouncerFacade as Bouncer;

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
        Bouncer::allow($createdUser)->toManage($createdUser);
        return ($createdUser);
    }
}
