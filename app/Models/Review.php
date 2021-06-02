<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($id)
 */
class Review extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'rating',
        'message',
        'public'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
