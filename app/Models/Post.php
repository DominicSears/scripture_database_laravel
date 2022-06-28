<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model
{
    use HasFactory;

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
