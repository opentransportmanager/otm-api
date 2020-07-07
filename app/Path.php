<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Path model.
 *
 * @property int $id
 * @property int $busline_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Station[] $stations
 * @property Collection|Course[] $courses
 * @property Busline $busline
 */
class Path extends Model
{
    protected $fillable = [
        'busline_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot',
        'busline',
    ];

    /**
     * Returns QueryBuilder instance along with applied filters and sorts.
     */
    public static function filter(): QueryBuilder
    {
        return QueryBuilder::for(static::class)
            ->allowedFilters([AllowedFilter::exact('busline_id')])
            ->allowedSorts('id', 'busline_id')
            ->allowedIncludes('courses', 'buslines');
    }

    public function stations(): BelongsToMany
    {
        return $this->belongsToMany(Station::class)
            ->withTimestamps()
            ->withPivot('travel_time')
            ->orderBy('travel_time');
    }

    /**
     * Returns an instance of (one-to-many) relation with Course model.
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Returns an instance of (inverse one-to-many) relation with Busline model.
     */
    public function busline(): BelongsTo
    {
        return $this->belongsTo(Busline::class);
    }
}
