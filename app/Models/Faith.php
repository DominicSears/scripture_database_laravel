<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Faith extends Model
{
    use HasFactory;

    protected $casts = [
        'start_of_faith' => 'datetime',
        'end_of_faith' => 'datetime'
    ];

    // Relationships

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function denomination(): HasOne
    {
        return $this->hasOne(Denomination::class, 'id', 'denomination_id');
    }

    public function religion(): HasOne
    {
        return $this->hasOne(Religion::class, 'id', 'religion_id');
    }

    // Inverse Relationships

    public function userFaith(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'faith_id');
    }
}
