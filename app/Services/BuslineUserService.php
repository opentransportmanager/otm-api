<?php

declare(strict_types=1);

namespace App\Services;

class BuslineUserService
{
    /**
     * Attaches Busline id to User model.
     */
    public function subscribeBusline($busline, $user): void
    {
        $user->buslines()->syncWithoutDetaching($busline);
    }

    /**
     * Detaches Busline id from User model.
     */
    public function unsubscribeBusline($busline, $user): void
    {
        $user->buslines()->detach($busline);
    }

    /**
     * Shows Buslines subscribed by User.
     */
    public function userSubscribedBuslines($user): array
    {
        $buslines = $user->buslines;

        return $buslines->makeHidden('pivot')->toArray();
    }
}
