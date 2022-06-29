<?php

namespace App\Contracts\Follow;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Followable
{
    public function following(): MorphMany;
}
