<?php

namespace App\Actions\User;

use App\Models\User;
use App\Contracts\User\CreatesUser;
use App\Contracts\User\ValidatesUser;
use Illuminate\Validation\ValidationException;

final class CreateUser implements CreatesUser
{
    public function __construct(private ValidatesUser $userValidator)
    {
    }

    /**
     * @throws ValidationException
     */
    public function __invoke(array $data): User
    {
        $validated = ($this->userValidator)($data)->validate();

        return User::query()->create($validated);
    }
}
