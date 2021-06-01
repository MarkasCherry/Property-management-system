<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'clients',
        'rating',
        'message'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
