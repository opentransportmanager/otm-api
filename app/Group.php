<?php

declare(strict_types=1);

namespace App;

use App\Events\GroupDeleted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon as Carbon;
use Illuminate\Support\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Group model.
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Course[] $courses
 */
class Group extends Model
{
    protected $fillable = [
        'name',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function filter(): QueryBuilder
    {
        return QueryBuilder::for(static::class)
            ->allowedFilters([AllowedFilter::exact('busline_id')])
            ->allowedSorts('id', 'busline_id')
            ->allowedIncludes('courses', 'courses.paths');
    }

    protected $dispatchesEvents = [
        'deleting' => GroupDeleted::class,
    ];

    /**
     * Returns an instance of (one-to-many) relation with Course class.
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
