<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon as Carbon;

/**
 * Station model.
 *
 * @property int                  $id
 * @property string               $name
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property Collection|Path[]    $paths
 * @property Collection|Busline[] $buslines
 */
class Station extends Model
{
    protected $fillable = ['name'];

    /**
     * Returns an instance of (many-to-many) relation with Path model.
     */
    public function paths(): BelongsToMany
    {
        return $this->belongsToMany(Path::class);
    }

    /**
     * Returns an instance of (many-to-many) relation with Busline model.
     */
    public function buslines(): BelongsToMany
    {
        return $this->belongsToMany(Busline::class);
    }
}
