<?php

namespace App\Contracts\Denomination;

use Illuminate\Contracts\Validation\Validator;

interface ValidatesDenomination
{
    /**
     * Validates denomination creation
     *
     * @param  array  $data
     * @param  bool  $isUpdate
     * @return Validator
     */
    public function __invoke(array $data, bool $isUpdate = false): Validator;
}
