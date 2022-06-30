<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vote extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'amount' => 'integer',
    ];

    // Helper

    public function vote(bool $upvote): void
    {
        $amount = $upvote ? 1 : -1;

        $this->attributes['amount'] += $amount;
    }

    public function resetVote(): void
    {
        $this->attributes['amount'] = 0;
    }

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
