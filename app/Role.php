<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Role model.
 *
 * @property int    $id
 * @property string $name
 * @property string $title
 * @property int    $level
 * @property int    $scope
 */
class Role extends Model
{
    protected $fillable = [
        'name',
    ];
}
