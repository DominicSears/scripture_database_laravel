<?php

namespace App\Contracts\Faith;

use App\Models\User;
use App\Models\Faith;

interface CreatesFaith
{
    /**
     * Creates a faith log
     *
     * @param  array  $data
     * @param  bool  $hasDenomination
     * @param  User|null  $user
     * @return Faith
     *
     * @throws App\Exceptions\Faith\MismatchFaithUserException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(array $data, bool $hasDenomination, ?User $user = null): Faith;
}
