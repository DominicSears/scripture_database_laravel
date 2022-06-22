<?php

namespace App\Contracts\Denomination;

use App\Models\Denomination;

interface CreatesDenomination
{
    /**
     * Action that creates denominations
     *
     * @throws \Illuminate\Validation\ValidationException
     * @param array $data
     * @return Denomination
     */
    public function __invoke(array $data): Denomination;
}
