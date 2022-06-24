<?php

namespace App\Contracts\Doctrine;

use Illuminate\Contracts\Validation\Validator;

interface ValidatesDoctrine
{
    /**
     * Validates doctrine data
     *
     * @param array $data
     * @param bool $isUpdate
     * @return Validator
     */
    public function __invoke(array $data, bool $isUpdate = false): Validator;
}
