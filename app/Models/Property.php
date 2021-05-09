<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @method static active()
 * @property mixed rooms
 */
class Property extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'import_id',
        'code',
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

    public function rooms(): Relation
    {
        return $this->hasMany(Room::class);
    }

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('active', true);
    }

    public function amenities(): Relation
    {
        return $this->belongsToMany(Amenity::class, 'property_amenity');
    }

    public function storeUniqueMedia($url)
    {
        $newFileName = explode('/', $url);
        $newFileName = str_replace(' ', '-', end($newFileName));

        $existingNames = $this->getMedia()->pluck('file_name');

        if(!$existingNames->contains($newFileName) && preg_match('/(\.jpg|\.png|\.bmp|\.jpeg|\.gif|\.tif)$/i', $url)) {
            try {
                return $this->addMediaFromUrl($url)
                    ->toMediaCollection();
            } catch (Exception $e) {
                return false;
            }
        }

        return false;
    }
}
