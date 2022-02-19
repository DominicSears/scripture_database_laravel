<?php

namespace App\Actions\Denomination;

use App\Contracts\Denomination\CreatesDenomination;
use App\Contracts\Denomination\ValidatesDenomination;
use App\Models\Denomination;

final class CreateDenomination implements CreatesDenomination
{
    public function __construct(private ValidatesDenomination $denominationValidator) {}

    public function __invoke(array $data): Denomination
    {
        $validated = ($this->denominationValidator)($data, false)->validate();

        return Denomination::query()->create($validated);
    }
}