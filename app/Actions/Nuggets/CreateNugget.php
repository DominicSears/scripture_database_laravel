<?php

namespace App\Actions\Nuggets;

use App\Models\Nugget;
use App\Contracts\Nuggets\ValidatesNugget;

class CreateNugget implements \App\Contracts\Nuggets\CreatesNugget
{
    public function __construct(private ValidatesNugget $nuggetValidator)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function __invoke(array $data): void
    {
        $validated = ($this->nuggetValidator)($data)->validated();

        Nugget::query()->create($validated);
    }
}
