<?php

namespace App\Contracts\Denomination;

use App\Models\Denomination;

interface UpdatesDenomination
{
    /**
     * Action to update a denomination
     *
     * @throws App\Exceptions\Denomination\MismatchUpdateDenominationException
     * @throws App\Exceptions\Denomination\MismatchDenominationReligionException
     * @throws \Illuminate\Validation\ValidationException
     * @param array $data
     * @param Denomination $denomination
     * @return void
     */
    public function __invoke(array $data, Denomination $denomination): void;
}