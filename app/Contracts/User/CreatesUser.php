<?php

namespace App\Contracts\User;

use App\Models\User;

interface CreatesUser
{
    /**
     * Function to create a user
     *
     * @return User
     */
    public function __invoke(array $data): User;
}