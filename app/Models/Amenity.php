<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static active()
 * @method static create(array $array)
 * @property mixed active
 * @property mixed name
 * @property mixed font_awesome
 */
class Amenity extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'font_awesome',
        'icon',
        'active'
    ];

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('active', true);
    }
}
