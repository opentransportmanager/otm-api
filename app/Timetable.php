<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon as Carbon;

/**
 * Timetable model.
 *
 * @property int         $id
 * @property int         $revision
 * @property array       $data         Json
 * @property bool        $is_published
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Timetable extends Model
{
    protected $casts = [
        '$data' => 'array',
    ];
}
