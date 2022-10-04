<?php

namespace App\Contracts\Nuggets;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

interface ValidatesNugget
{
    /**
     * Validate the array of data for Nugget model
     *
     * @param  array  $data
     * @param  bool  $update
     * @return void
     *
     * @throws ValidationException
     */
    public function __invoke(array $data, bool $update = false): Validator;
}
