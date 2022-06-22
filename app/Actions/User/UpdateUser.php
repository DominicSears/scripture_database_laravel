<?php

namespace App\Actions\User;

use App\Contracts\User\UpdatesUser;
use App\Contracts\User\ValidatesUser;
use App\Exceptions\User\MismatchUpdateUserException;
use App\Models\User;

final class UpdateUser implements UpdatesUser
{
    public function __construct(private ValidatesUser $userValidator)
    {
    }

    public function __invoke(array $data, ?User $user = null, ?int $user_id = null): void
    {
        $validated = ($this->userValidator)($data, true)->validate();

        if (isset($user) && $user->getKey() != $validated['id']) {
            throw new MismatchUpdateUserException();
        }

        $user ??= User::query()->find($validated['id']);

        $user->update($validated);

        $user->save();
    }
}
