<?php

declare(strict_types=1);

namespace App\Events;

use App\Path;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PathDeleted
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(Path $path)
    {
        $this->path = $path;
    }
}
