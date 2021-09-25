<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable, SoftDeletes;

    protected $guarded = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'country_iso_code' => 'integer',
        'created_at' => 'immutable_datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Scopes



    // Relationships

    public function faith(): HasOne
    {
        return $this->hasOne(Faith::class);
    }

    public function allFaiths(): HasMany
    {
        return $this->hasMany(Faith::class, 'user_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'created_by');
    }

    public function updatedPosts(): HasMany
    {
        return $this->hasMany(Post::class, 'updated_by');
    }

    public function nuggets(): HasMany
    {
        return $this->hasMany(Nugget::class, 'created_by');
    }

    public function updatedNuggets(): HasMany
    {
        return $this->hasMany(Nugget::class, 'updated_by');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    // Inverse Relationships

    public function faithUser(): BelongsTo
    {
        return $this->belongsTo(Faith::class, 'id', 'user_id');
    }

    public function postUser(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'id', 'created_by');
    }

    public function postUpdatedUser(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'id', 'updated_by');
    }

    public function nuggetUser(): BelongsTo
    {
        return $this->belongsTo(Nugget::class, 'id', 'created_by');
    }

    public function nuggetUpdatedUser(): BelongsTo
    {
        return $this->belongsTo(Nugget::class, 'id', 'updated_by');
    }
}
