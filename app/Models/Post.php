<?php

namespace App\Models;

use App\Contracts\Vote\Votable;
use App\Contracts\Comment\Commentable;
use App\Traits\HasComments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model implements Votable, Commentable
{
    use HasFactory, HasComments;

    protected $casts = [
        'created_at' => 'immutable_datetime',
        'updated_at' => 'datetime',
        'published_at' => 'datetime',
    ];

    public const POST_TYPES = [
        'doctrine' => Doctrine::class,
        'user' => User::class,
        'religion' => Religion::class,
        'nugget' => Nugget::class,
        'faith' => Faith::class,
        'denomination' => Denomination::class,
    ];

    // Attributes

    public function description(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => strip_tags($attributes['content'])
        );
    }

    // Scopes

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->where('title', 'LIKE', '%'.$search.'%')
            ->orWhere('slug', 'LIKE', '%'.$search.'%')
            ->orWhere('content');
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

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function votes(): MorphMany
    {
        return $this->morphMany(Vote::class, 'votable');
    }

    public function follows(): MorphMany
    {
        return $this->morphMany(Follow::class, 'followable');
    }

    // Inverse Realtionships

    public function userCreatedPosts(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'created_by');
    }

    public function userUpdatedPosts(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'updated_by');
    }
}
