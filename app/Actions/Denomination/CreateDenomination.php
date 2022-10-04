<?php

namespace App\Actions\Denomination;

use App\Models\Denomination;
use App\Contracts\Denomination\CreatesDenomination;
use App\Contracts\Denomination\ValidatesDenomination;

final class CreateDenomination implements CreatesDenomination
{
    public function __construct(private ValidatesDenomination $denominationValidator)
    {
    }

    /**
     * @inheritDoc
     */
    public function __invoke(array $data): Denomination
    {
        $validated = ($this->denominationValidator)($data)->validate();

        $denomination = new Denomination($validated);
        $denomination->save();

        return $denomination;
    }
}
