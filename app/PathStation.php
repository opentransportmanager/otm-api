<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;

/**
 * PathStation intermediate model.
 *
 * @property int $id
 * @property int $path_id
 * @property int $station_id
 * @property int $travel_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class PathStation extends Pivot
{
    public $incrementing = true;

    /**
     * Returns an intermediate model instance containing a selected path_id and station_id combination.
     */
    public static function findIntermediateModel(int $pathId, int $stationId): PathStation
    {
        return PathStation::where('station_id', $stationId)
            ->where('path_id', $pathId)
            ->firstOrFail();
    }
}
