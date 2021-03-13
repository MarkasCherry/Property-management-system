<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @method static active()
 * @property mixed active
 * @property mixed name
 */
class Amenity extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'name',
        'active'
    ];

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('active', true);
    }
}
