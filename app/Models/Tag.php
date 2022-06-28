<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    // Custom Attributes

    public function title(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => $attributes['name'],
            set: fn ($value, $attributes) => $attribute['name'] = $value
        );
    }

    // Relationships

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

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'taggable');
    }

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function doctrines(): MorphToMany
    {
        return $this->morphedByMany(Doctrine::class, 'taggable');
    }

    public function denominations(): MorphToMany
    {
        return $this->morphedByMany(Denomination::class, 'taggable');
    }

    public function religions(): MorphToMany
    {
        return $this->morphedByMany(Religion::class, 'taggable');
    }

    public function nuggets(): MorphToMany
    {
        return $this->morphedByMany(Nugget::class, 'taggable');
    }
}
