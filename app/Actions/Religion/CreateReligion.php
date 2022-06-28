<?php

namespace App\Actions\Religion;

use App\Models\Religion;
use App\Contracts\Religion\CreatesReligion;
use App\Contracts\Religion\ValidatesReligion;

final class CreateReligion implements CreatesReligion
{
    public function __construct(private ValidatesReligion $religionValidator)
    {
    }

    public function __invoke(array $data): Religion
    {
        $validated = ($this->religionValidator)($data)->validate();

        return Religion::query()->create($validated);
    }
}
