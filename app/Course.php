<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Course model.
 *
 * @property int                             $id
 * @property int                             $path_id
 * @property int                             $station_id
 * @property string                          $start_time
 * @property null|\Illuminate\Support\Carbon $created_at
 * @property null|\Illuminate\Support\Carbon $updated_at
 */
class Course extends Model
{
}
