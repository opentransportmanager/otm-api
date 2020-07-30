<?php

declare(strict_types=1);

namespace App\Events;

use App\Station;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StationDeleted
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(Station $station)
    {
        $this->station = $station;
    }
}
