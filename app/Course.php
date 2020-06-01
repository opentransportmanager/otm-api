<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon as Carbon;

/**
 * Course model.
 *
 * @property int         $id
 * @property int         $path_id
 * @property int         $group_id
 * @property string      $start_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Path        $path
 * @property Group       $group
 */
class Course extends Model
{
    protected $fillable = [
        'path_id',
        'group_id',
        'start_time',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'start_time' => 'datetime:H:i',
    ];

    /**
     * Returns an instance of (inverse one-to-many) relation with Group class.
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Returns an instance of (inverse one-to-many) relation with Path class.
     *
     * @return void
     */
    public function path(): BelongsTo
    {
        return $this->belongsTo(Path::class);
    }
}
