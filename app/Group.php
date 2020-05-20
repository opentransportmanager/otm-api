<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Group model.
 *
 * @property int                             $id
 * @property string                          $name
 * @property null|\Illuminate\Support\Carbon $created_at
 * @property null|\Illuminate\Support\Carbon $updated_at
 */
class Group extends Model
{
}
