<?php

namespace App\Contracts\Doctrinable;

use Illuminate\Contracts\Validation\Validator;

interface ValidatesDoctrinable
{
    /**
     * Returns a validator for doctrinable
     *
     * @param array $data
     * @param bool $isUpdate
     * @return Validator
     */
    public function __invoke(array $data, bool $isUpdate = false): Validator;
}
