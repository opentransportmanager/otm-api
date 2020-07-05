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
        $event->busline->paths()->delete();
    }
}
