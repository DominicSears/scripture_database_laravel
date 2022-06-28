<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Doctrine extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'scriptures' => 'array',
    ];

    // Attributes

    public function linkTitle(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => '<a href="'.
                route('doctrines.show', [$this->getKey()]).
                '">'.$attributes['title'].'</a>'
        );
    }

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

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
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

    public function denominationDoctrine(): MorphToMany
    {
        return $this->morphedByMany(Denomination::class, 'doctrinable');
    }

    public function religionDoctrine(): MorphToMany
    {
        return $this->morphedByMany(Religion::class, 'doctrinable');
    }
}
