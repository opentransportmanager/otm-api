<?php

declare(strict_types=1);

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon as Carbon;
use Laravel\Sanctum\HasApiTokens;
use Silber\Bouncer\Database\HasRolesAndAbilities;

/**
 * User model.
 *
 * @property int         $id
 * @property string      $name
 * @property string      $email
 * @property Carbon|null $email_verified_at
 * @property string      $password
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasRolesAndAbilities;
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
