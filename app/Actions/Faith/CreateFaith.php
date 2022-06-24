<?php

namespace App\Actions\Faith;

use App\Contracts\Faith\CreatesFaith;
use App\Contracts\Faith\ValidatesNewFaith;
use App\Exceptions\Faith\MismatchFaithUserException;
use App\Models\Faith;
use App\Models\User;
use Illuminate\Support\Arr;

final class CreateFaith implements CreatesFaith
{
    public function __construct(private ValidatesNewFaith $validatesFaith)
    {
    }

    public function __invoke(array $data, bool $hasDenomination, ?User $user = null): Faith
    {
        $validated = ($this->validatesFaith)($data, $hasDenomination)->validate();

        // Check if the user provided is the same as the data in the request
        if (isset($user) && $user->getKey() != $validated['user_id']) {
            // Log the data the fact of different matching info?
            throw new MismatchFaithUserException();
        }

        $faith = Faith::query()
            ->create(Arr::except($validated, ['end_of_faith', 'reason_left']));

        $user ??= User::query()
            ->find($validated['user_id']);

        // Update previous faith log with change information
        Faith::query()
            ->where('id', $user->faith_id)
            ->update([
                'end_of_faith' => $validated['end_of_faith'],
                'reason_left' => $validated['reason_left'],
            ]);

        // Save new key to user
        $user->faith_id = $faith->getKey();
        $user->save();

        return $faith;
    }
}
