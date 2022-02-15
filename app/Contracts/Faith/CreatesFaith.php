<?php

namespace App\Contracts\Faith;

use App\Models\Faith;
use App\Models\User;

interface CreatesFaith
{
    /**
     * Creates a faith log
     *
     * @throws App\Exceptions\Faith\MismatchFaithUserException
     * @throws \Illuminate\Validation\ValidationException
     * @param array $data
     * @param bool $hasDenomination
     * @param User|null $user
     * @return Faith
     */
    public function __invoke(array $data, bool $hasDenomination, ?User $user = null): Faith;
}