<?php

namespace App\Models;

use App\Traits\HasComments;
use App\Contracts\Vote\Votable;
use App\Contracts\Comment\Commentable;
use App\Traits\HasUrlAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Denomination extends Model implements Votable, Commentable
{
    use HasFactory, HasComments, HasUrlAttributes;

    protected $guarded = [];

    // Attributes

    public function title(): Attribute
    {
        return new Attribute(
            get: function ($value, $attributes) {
                if (isset($this->relations['religion'])) {
                    return $attributes['name'].' ('.
                        $this->relations['religion']->name.')';
                }

                return $attributes['name'];
            },
            set: fn ($value, $attributes) => $attributes['name'] = $value
        );
    }

    // Scopes

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

    public function votes(): MorphMany
    {
        return $this->morphMany(Vote::class, 'votable');
    }

    public function follows(): MorphMany
    {
        return $this->morphMany(Follow::class, 'followable');
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
