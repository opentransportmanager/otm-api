<?php

declare(strict_types=1);

namespace App\Services;

use App\User;

class BuslineUserService
{
    /**
     * Attaches Busline id to User model.
     */
    public function subscribeBusline($busline, User $user): void
    {
        $user->buslines()->syncWithoutDetaching($busline);
    }

    /**
     * Detaches Busline id from User model.
     */
    public function unsubscribeBusline($busline, User $user): void
    {
        $user->buslines()->detach($busline);
    }

    /**
     * Shows Buslines subscribed by User.
     */
    public function showSubscribedBuslines(User $user): array
    {
        $buslines = $user->buslines;

        return $buslines->makeHidden('pivot')->toArray();
    }
}
