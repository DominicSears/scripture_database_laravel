<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Religion extends Model
{
    use HasFactory;

    // Relationships

    public function parent(): HasOne
    {
        return $this->hasOne($this::class, 'id', 'parent_id');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function nuggets(): MorphToMany
    {
        return $this->morphToMany(Nugget::class, 'nuggetable');
    }

    // Inverse Relationships

    public function religionParent(): BelongsTo
    {
        return $this->belongsTo($this::class, 'id', 'parent_id');
    }
}
