<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Doctrine extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'scriptures' => 'array'
    ];

    // Relationships

    public function createdBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

    public function religion(): MorphToMany
    {
        return $this->morphedByMany(Religion::class, 'doctrinable');
    }

    public function denomination(): MorphToMany
    {
        return $this->morphToMany(Denomination::class, 'doctrinable');
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

    public function denominationDoctrine(): MorphToMany
    {
        return $this->morphedByMany(Denomination::class, 'doctrinable');
    }

    public function religionDoctrine(): MorphToMany
    {
        return $this->morphedByMany(Religion::class, 'doctrinable');
    }
}
