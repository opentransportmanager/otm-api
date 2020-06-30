<?php

declare(strict_types=1);

namespace App\Services;

use App\User;

class BuslineUserService
{
    /**
     * Attaches array of Station ids and relative travel time to each to provided Path model.
     */
    public function subscribeBusline($busline, User $user): void
    {
        $user->buslines()->attach($busline);
    }
    /**
     * Attaches array of Station ids and relative travel time to each to provided Path model.
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

        foreach ($buslines as $busline) {
            $busline->setAttribute('busline_number', $busline->number);
        }

        return $busline->toArray();
    }
}
