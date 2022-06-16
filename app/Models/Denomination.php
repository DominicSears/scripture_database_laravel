<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Denomination extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Custom Attributes

    public function title(): Attribute
    {
        return new Attribute(
            get: fn($value, $attributes) => $attributes['name'],
            set: fn($value, $attributes) => $attributes['name'] = $value
        );
    }

    // Relationships

    public function parent(): HasOne
    {
        return $this->hasOne($this::class, 'id', 'parent_id');
    }

    public function religion(): HasOne
    {
        return $this->hasOne(Religion::class, 'id', 'religion_id');
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

    // Inverse Relationships

    public function denominationParent(): BelongsTo
    {
        return $this->belongsTo($this::class, 'id', 'parent_id');
    }

    public function religionDenomination(): BelongsTo
    {
        return $this->belongsTo(Religion::class, 'id', 'denomination_id');
    }
}
