<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon as Carbon;
use Illuminate\Support\Collection;

/**
 * Busline model.
 *
 * @property int $id
 * @property string $number
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Path[] $paths
 */
class Busline extends Model
{
    protected $fillable = [
        'number',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Returns an instance of (one-to-many) relation with Busline class.
     */
    public function paths(): HasMany
    {
        return $this->hasMany(Path::class);
    }
}
