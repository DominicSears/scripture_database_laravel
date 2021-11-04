<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Nugget extends Model
{
    use HasFactory;

    const NUGGET_TYPE_REFUTE = 0;
    const NUGGET_TYPE_SUPPORT = 1;
    const NUGGET_TYPE_GENERAL = 2;

    const NUGGET_TYPES = [
        'refute',
        'support',
        'general'
    ];

    // Relationships

    public function createdBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function deletedBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'deleted_by');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    // Inverse Relationships

    public function denominationNuggets(): MorphToMany
    {
        return $this->morphedByMany(Denomination::class, 'nuggetable');
    }

    public function doctrineNuggets(): MorphToMany
    {
        return $this->morphedByMany(Doctrine::class, 'nuggetable');
    }

    public function religionNuggets(): MorphToMany
    {
        return $this->morphedByMany(Religion::class, 'nuggetable');
    }
}
