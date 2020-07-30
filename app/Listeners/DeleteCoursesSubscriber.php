<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\GroupDeleted;
use App\Events\PathDeleted;


class DeleteCoursesSubscriber
{
    /**
     * Handle Path delete event.
     */
    public function handlePathDeleted(PathDeleted $event): void
    {
        $event->path->courses()->delete();
    }

    /**
     * Handle Group delete event.
     */
    public function handleGroupDeleted(GroupDeleted $event): void
    {
        $event->group->courses()->delete();
    }

    public function subscribe($events): void
    {
        $events->listen(
            PathDeleted::class,
            DeleteCoursesSubscriber::class . '@handlePathDeleted',
        );

        $events->listen(
            GroupDeleted::class,
            DeleteCoursesSubscriber::class . '@handleGroupDeleted',
        );
    }
}
