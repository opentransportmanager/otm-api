<?php

declare(strict_types=1);

namespace App\Services;

use App\Path;
use App\Station;

class PathStationService
{
    /**
     * Attaches array of Station ids and relative travel time to each to provided Path model.
     */
    public function attachStations(array $stations, Path $path): void
    {
        foreach ($stations as $station) {
            $path->stations()->syncWithoutDetaching([$station['id'] => ['travel_time' => $station['travel_time']]]);
        }
    }

    /**
     * Detaches array of Stations from provided Path model by provided list of station ids.
     */
    public function detachStations(array $stations, Path $path): void
    {
        foreach ($stations as $station) {
            $path->stations()->detach($station['id']);
        }
    }

    /**
     * Shows Stations attached to a provided Path model and appends relative travel_time.
     */
    public function showAttachedStations(Path $path): array
    {
        $stations = $path->stations;

        $stations->map(function (Station $station): Station {
            $station['travel_time'] = $station->pivot->travel_time;

            return $station;
        });

        return $stations->toArray();
    }
}
