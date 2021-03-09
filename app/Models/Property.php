<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @method static active()
 */
class Property extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'name',
        'rating',
        'address',
        'short_description',
        'long_description',
        'available_rooms',
        'seo_h1_title',
        'seo_meta_title',
        'seo_meta_description',
        'public',
        'active'
    ];

    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', true);
    }
}
