<?php

namespace App\Actions\User;

use App\Contracts\User\CreatesUser;
use App\Contracts\User\ValidatesUser;
use App\Models\User;

final class CreateUser implements CreatesUser
{
    public function __construct(private ValidatesUser $userValidator) {}

    public function __invoke(array $data): User
    {
        $validated = ($this->userValidator)($data)->validate();

        return User::query()->create($validated);
    }
}