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
 * @property Point             $position
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

    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
    ];

    /**
     * Transforms input location data to Point object.
     */
    public function setPositionAttribute(array $value): void
    {
        $this->attributes['position'] = new Point($value['lat'], $value['lng']);
    }

    /**
     * Transforms the retrieved position data.
     */
    public function getPositionAttribute(Point $value): array
    {
        return [
            'lat' => $value->getLat(),
            'lng' => $value->getLng(),
        ];
    }

    /**
     * Returns an instance of (many-to-many) relation with Path model.
     */
    public function paths(): BelongsToMany
    {
        return $this->belongsToMany(Path::class)->withTimestamps()->withPivot('travel_time');
    }
}
