<?php

declare(strict_types=1);

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
    public function createToken(array $input): array
    {
        $user = User::where('email', $input['email'])->first();

        if (!$user || !Hash::check($input['password'], $user->password)) {
            return [];
        }

        $token = $user->createToken('otm-token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
