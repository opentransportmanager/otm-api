<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon as Carbon;
use Illuminate\Support\Collection;

/**
 * Group model.
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Busline[] $courses
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

    /**
     * Returns an instance of (one-to-many) relation with Course class.
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
