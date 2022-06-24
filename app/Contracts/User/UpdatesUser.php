<?php

namespace App\Contracts\User;

use App\Models\User;

interface UpdatesUser
{
    /**
     * Function to update user's data
     *
     * @throws App\Exceptions\MismatchUpdateUserException
     * @param array $data
     * @param User|null $user
     * @param int|null $user_id
     * @return void
     */
    public function __invoke(array $data, ?User $user = null, ?int $user_id = null): void;
}
