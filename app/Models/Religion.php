<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Builder;

class Religion extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Custom Attributes

    public function title(): Attribute
    {
        return new Attribute(
            get: fn($value, $attributes) => $attributes['name'],
            set: fn($value, $attributes) => $attribute['name'] = $value
        );
    }

    // Scopes

    public function scopeActive(Builder $query, bool $active = true): Builder
    {
        return $query->where('approved', $active);
    }

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

    public function doctrines(): MorphToMany
    {
        return $this->morphToMany(Doctrine::class, 'doctrinable');
    }

    public function denominations(): HasMany
    {
        return $this->hasMany(Denomination::class, 'religion_id')
            ->where('approved', true);
    }

    public function allDenominations(): HasMany
    {
        return $this->hasMany(Denomination::class, 'religion_id');
    }

    // Inverse Relationships

    public function religionParent(): BelongsTo
    {
        return $this->belongsTo($this::class, 'id', 'parent_id');
    }
}
