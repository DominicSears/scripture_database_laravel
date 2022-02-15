<?php

namespace App\Contracts\User;

use Illuminate\Contracts\Validation\Validator;

interface ValidatesUser
{
    /**
     * Function that returns a validator for creating/editing users
     *
     * @param array $data
     * @param bool $isUpdate
     * @return Validator
     */
    public function __invoke(array $data, bool $isUpdate = false): Validator;
}