<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vote extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'amount' => 'integer',
    ];

    // Relationships

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    // Inverse Relationships

    public function votable(): MorphTo
    {
        return $this->morphTo();
    }
}
