<?php

namespace App\Models;

use App\Traits\HasComments;
use App\Contracts\Vote\Votable;
use App\Traits\HasUrlAttributes;
use App\Contracts\Comment\Commentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Religion extends Model implements Votable, Commentable
{
    use HasFactory, HasComments, HasUrlAttributes;

    protected $guarded = [];

    // Attributes

    public function title(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => $attributes['name'],
            set: fn ($value, $attributes) => $attributes['name'] = $value
        );
    }

    // Scopes

    public function scopeActive(Builder $query, bool $active = true): Builder
    {
        return $query->where('approved', $active);
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('description', 'LIKE', '%'.$search.'%');
    }

    // Relationships

    public function createdBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

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

    public function follows(): MorphMany
    {
        return $this->morphMany(Follow::class, 'followable');
    }

    public function votes(): MorphMany
    {
        return $this->morphMany(Vote::class, 'votable');
    }

    // Inverse Relationships

    public function religionParent(): BelongsTo
    {
        return $this->belongsTo($this::class, 'id', 'parent_id');
    }
}
