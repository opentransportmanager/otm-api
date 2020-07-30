<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\BuslineDeleted;

class DeleteBuslinePaths
{
    /**
     * Handle the event.
     */
    public function handle(BuslineDeleted $event): void
    {
        $paths = $event->busline->paths()->get();
        foreach ($paths as $path) {
            $path->delete();
        }
    }
}
