<?php

declare(strict_types=1);

namespace App\Services;

use App\Station;
use Illuminate\Database\Eloquent\Collection;

class StationService //Repository?
{

    public function subscribed(): Collection
    {
        //Query getting all stations subscribed by user to current user goes here
        $stations = Station::all();
        abort(501);
        return $stations;
    }
}
