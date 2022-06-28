<?php

namespace App\Contracts\Denomination;

use App\Models\Denomination;

interface UpdatesDenomination
{
    /**
     * Action to update a denomination
     *
     * @param  array  $data
     * @param  Denomination  $denomination
     * @return void
     *
     * @throws App\Exceptions\Denomination\MismatchUpdateDenominationException
     * @throws App\Exceptions\Denomination\MismatchDenominationReligionException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(array $data, Denomination $denomination): void;
}
