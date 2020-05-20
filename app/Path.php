<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Path model.
 *
 * @property int                             $id
 * @property int                             $busline_id
 * @property null|\Illuminate\Support\Carbon $created_at
 * @property null|\Illuminate\Support\Carbon $updated_at
 */
class Path extends Model
{
}
