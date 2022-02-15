<?php

namespace App\Actions\Faith;

use App\Models\Faith;
use App\Contracts\Faith\UpdatesFaith;
use App\Contracts\Faith\ValidatesFaith;
use App\Exceptions\Faith\MismatchFaithUserException;
use App\Exceptions\Faith\InvalidFaithUpdateDataException;

final class UpdateFaith implements UpdatesFaith
{
    public function __construct(private ValidatesFaith $validatesFaith) {}

    public function __invoke(array $data, bool $hasDenomination, ?Faith $faith = null, ?int $faith_id = null): void
    {
        $validated = ($this->validatesFaith)($data, $hasDenomination)->validate();

        if (isset($faith)) {
            if ($faith->user_id != $validated['user_id']) {
                throw new MismatchFaithUserException();
            }

            $faith->update($validated);
        } else if (isset($faith_id)) {
            Faith::query()
                ->where('id', $faith_id)
                ->update($validated);
        } else {
            throw new InvalidFaithUpdateDataException();
        }
    }
}