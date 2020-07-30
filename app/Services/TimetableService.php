<?php

declare(strict_types=1);

namespace App\Services;

use App\Path;

class TimetableService
{
    /**
     * Shows all paths with attached stations with appended travel_time
     */
    public function fetch(): array
    {
        $timetable = Path::with('stations')->with('courses')->get();
        foreach ($timetable as $path) {
            foreach ($path->stations as $station) {
                $station->setAttribute('travel_time', $station->pivot->travel_time);
            }
        }
        return $timetable->toArray();
    }
}
