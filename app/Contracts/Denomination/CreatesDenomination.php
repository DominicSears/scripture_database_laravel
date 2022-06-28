<?php

namespace App\Contracts\Denomination;

use App\Models\Denomination;

interface CreatesDenomination
{
    /**
     * Action that creates denominations
     *
     * @param  array  $data
     * @return Denomination
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(array $data): Denomination;
}
