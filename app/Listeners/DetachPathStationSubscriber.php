<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\PathDeleted;
use App\Events\StationDeleted;

class DetachPathStationSubscriber
{
    /**
     * Handle Station delete event.
     */
    public function handleStationDeleted(StationDeleted $event): void
    {
        $event->station->paths()->detach();
    }

    /**
     * Handle Path delete event.
     */
    public function handlePathDeleted(PathDeleted $event): void
    {
        $event->path->stations()->detach();
    }

    public function subscribe($events): void
    {
        $events->listen(
            StationDeleted::class,
            DetachPathStationSubscriber::class . '@handleStationDeleted',
        );

        $events->listen(
            PathDeleted::class,
            DetachPathStationSubscriber::class . '@handlePathDeleted',
        );
    }

}
