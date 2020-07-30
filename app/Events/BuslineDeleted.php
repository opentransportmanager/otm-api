<?php

declare(strict_types=1);

namespace App\Events;

use App\Busline;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BuslineDeleted
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(Busline $busline)
    {
        $this->busline = $busline;
    }
}
