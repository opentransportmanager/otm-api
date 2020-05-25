<?php

declare(strict_types=1);

namespace App;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon as Carbon;

/**
 * Station model.
 *
 * @property int               $id
 * @property string            $name
 * @property Carbon|null       $created_at
 * @property Carbon|null       $updated_at
 * @property Collection|Path[] $paths
 */
class Station extends Model
{
    use SpatialTrait;

    protected $fillable = [
        'name',
        'position',
    ];

    protected $spatialFields = [
        'position',
    ];

    /**
     * Transforms input location data to Point object.
     */
    public function setPositionAttribute($value): void
    {
        $this->attributes['position'] = new Point($value['lat'], $value['lng']);
    }

    /**
     * Returns an instance of (many-to-many) relation with Path model.
     */
    public function paths(): BelongsToMany
    {
        return $this->belongsToMany(Path::class);
    }
}
