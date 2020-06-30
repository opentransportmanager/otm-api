<?php

declare(strict_types=1);

namespace App\Services;

use App\Path;
use App\PathStation;
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

        foreach ($stations as $station) {
            $station->setAttribute('travel_time', $station->pivot->travel_time);
        }

        return $stations->toArray();
    }

    /**
     * Updates travel_time in path_station pivot table.
     */
    public function update(array $travelTime, Path $path, Station $station): void
    {
        PathStation::findIntermediateModel($path->id, $station->id)->update($travelTime);
    }
}
