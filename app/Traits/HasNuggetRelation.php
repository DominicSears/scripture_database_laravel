<?php

namespace App\Traits;

use App\Models\Nugget;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasNuggetRelation
{
    public function nuggets(): MorphToMany
    {
        return $this->morphToMany(Nugget::class, 'nuggetable')
            ->withTimestamps()
            ->withPivot(['nugget_type_id']);
    }
}
