<?php

namespace App\Contracts\Vote;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Votable
{
    public function votes(): MorphMany;
}
