<?php

namespace App\Contracts\Religion;

use Illuminate\Contracts\Validation\Validator;

interface ValidatesReligion
{
    /**
     * Religions validator
     *
     * @param array $data
     * @param bool $isUpdate
     * @return Validator
     */
    public function __invoke(array $data, bool $isUpdate = false): Validator;
}