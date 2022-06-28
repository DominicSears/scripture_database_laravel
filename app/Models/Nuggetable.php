<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Nuggetable extends Model
{
    use HasFactory;

    public function nuggetableNugget(): MorphTo
    {
        return $this->morphTo();
    }

    // Inverse Relationships
}
