<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static latest()
 */
class Announcements extends Model
{
    protected $fillable = [
        'user_id',
        'message'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
