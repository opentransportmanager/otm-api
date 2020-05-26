<?php

declare(strict_types=1);

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;

class RegistrationService
{
    public function registerUser(array $input): array
    {
        //work in progress
        User::create($input->validated());
    }
}
