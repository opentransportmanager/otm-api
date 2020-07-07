<?php

declare(strict_types=1);

namespace App\Services;

use App\Path;
use App\PathStation;
use App\Station;
use Illuminate\Support\Carbon;

class StationPathService
{
    /**
     * Shows Paths attached to selected Station.
     */
    public function showAttachedPaths(Station $station): array
    {
        $paths = $station->paths;

        foreach ($paths as $path) {
            $path->setAttribute('busline_number', $path->busline->number);
        }

        return $paths->toArray();
    }

    /**
     * Shows timetable based on selected Station and Path combination with courses and groups.
     */
    public function showTimetable(Station $station, Path $path): array
    {
        $travel_time = PathStation::findIntermediateModel($path->id, $station->id)->travel_time;
        $timetable = $path->courses;
        foreach ($timetable as $course) {
            $departure_time = Carbon::parse($course->start_time);
            $departure_time->addMinutes($travel_time);
            $course->setAttribute('departure_time', $departure_time->format(config('formats.hours_minutes')));
            $course->setAttribute('group', $course->group);
        }

        return $timetable->sortBy('departure_time')->toArray();
    }
}
