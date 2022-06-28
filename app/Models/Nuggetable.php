<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nuggetable extends Model
{
    use HasFactory;

    public function nuggetableNugget(): MorphTo
    {
        return $this->morphTo();
    }

    // Inverse Relationships
}
