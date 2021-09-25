<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Doctrine extends Model
{
    use HasFactory;

    // Relationships

    public function religion(): HasOne
    {
        return $this->hasOne(Religion::class, 'id', 'religion_id');
    }

    public function denomination(): HasOne
    {
        return $this->hasOne(Denomination::class, 'id', 'denomination_id');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    // TODO: Connect doctrine through tags

    // Inverse Relationships
}
