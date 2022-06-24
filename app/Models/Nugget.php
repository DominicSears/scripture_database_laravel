<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Nugget extends Model
{
    use HasFactory;

    public const NUGGET_TYPE_REFUTE = 0;

    public const NUGGET_TYPE_SUPPORT = 1;

    public const NUGGET_TYPE_GENERAL = 2;

    public const NUGGET_TYPES = [
        'refute',
        'support',
        'general',
    ];

    public const NUGGETS_FROM = [
        'religions',
        'denominations',
        'doctrines',
    ];

    // Attributes

    public function nuggetType(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => $this->getNuggetTypeById($attributes['nugget_type_id']),
            set: function ($value, $attributes) {
                $attributes['nugget_type'] = $this->getNuggetTypeIdByString($value);
            }
        );
    }

    // Helper functions

    public static function getNuggetTypeById(string $nugget): string
    {
        return self::NUGGET_TYPES[(int) $nugget] ??
            throw new \Exception('Unknown nugget type');
    }

    public static function getNuggetTypeIdByString(string $nugget): string
    {
        return array_flip(self::NUGGET_TYPES)[$nugget] ??
            throw new \Exception('Unknown nugget type');
    }

    public function availableNuggetableRelations(): array
    {
        $relations = array_keys($this->relations);

        $related = [];

        foreach ($relations as $relation) {
            if (in_array($relation, self::NUGGETS_FROM) &&
                $this->relations[$relation]->isNotEmpty()) {
                $related[] = $relation;
            }
        }

        return $related;
    }

    // Relationships

    public function createdBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function deletedBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'deleted_by');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function denominations(): MorphToMany
    {
        return $this->morphedByMany(Denomination::class, 'nuggetable');
    }

    public function religions(): MorphToMany
    {
        return $this->morphedByMany(Religion::class, 'nuggetable');
    }

    public function doctrines(): MorphToMany
    {
        return $this->morphedByMany(Doctrine::class, 'nuggetable');
    }

    // Inverse Relationships

    public function denominationNuggets(): MorphToMany
    {
        return $this->morphedByMany(Denomination::class, 'nuggetable');
    }

    public function doctrineNuggets(): MorphToMany
    {
        return $this->morphedByMany(Doctrine::class, 'nuggetable');
    }

    public function religionNuggets(): MorphToMany
    {
        return $this->morphedByMany(Religion::class, 'nuggetable');
    }
}
