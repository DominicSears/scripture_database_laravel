<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
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
