<?php

namespace App\Actions\Denomination;

use App\Contracts\Denomination\UpdatesDenomination;
use App\Contracts\Denomination\ValidatesDenomination;
use App\Exceptions\Denomination\MismatchUpdateDenominationException;
use App\Models\Denomination;

final class UpdateDenomination implements UpdatesDenomination
{
    public function __construct(private ValidatesDenomination $denominationValidator) {}

    public function __invoke(array $data, Denomination $denomination): void
    {
        $validated = ($this->denominationValidator)($data, true)->validate();

        if ($validated['id'] !== $denomination->getKey()) {
            throw new MismatchUpdateDenominationException();
        }

        $denomination->update($validated);
    }
}