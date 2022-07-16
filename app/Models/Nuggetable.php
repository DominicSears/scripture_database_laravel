<?php

namespace App\Models;

use App\Contracts\Comment\Commentable;
use App\Traits\HasComments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nuggetable extends Model implements Commentable
{
    use HasFactory, HasComments;

    public function nuggetableNugget(): MorphTo
    {
        return $this->morphTo();
    }

    // Inverse Relationships
}
