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
    public function unsubscribeBusline($busline, $user): bool
    {
        $exists = $user->buslines()->where('busline_id', $busline['busline_id'])->exists();
        $user->buslines()->detach($busline);

        return $exists;
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
