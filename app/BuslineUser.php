<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;

/**
 * PathStation intermediate model.
 *
 * @property int $id
 * @property int $user_id
 * @property int $busline_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class BuslineUser extends Pivot
{
    //
}
