<?php

namespace App\Actions\Religion;

use App\Models\Religion;
use App\Contracts\Religion\UpdatesReligion;
use App\Contracts\Religion\ValidatesReligion;

final class UpdateReligion implements UpdatesReligion
{
    public function __construct(private ValidatesReligion $religionValidator)
    {
    }

    public function __invoke(array $data, Religion $religion): void
    {
        $validated = ($this->religionValidator)($data, true)->validate();

        if ($validated['id'] != $religion->getKey()) {
            // Throw custom exception
        }

        // TODO: Finish update checks
        $religion->update($validated);
    }
}
