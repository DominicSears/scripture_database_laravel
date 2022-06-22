<?php

namespace App\Contracts\Faith;

use Illuminate\Contracts\Validation\Validator;

interface ValidatesFaith
{
    /**
     * Validates an array of data
     *
     * @param array $data
     * @param bool $hasDenomination
     * @return Validator
     */
    public function __invoke(array $data, $hasDenomination = false): Validator;
}
