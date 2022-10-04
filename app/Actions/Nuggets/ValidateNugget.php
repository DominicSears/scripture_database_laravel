<?php

namespace App\Actions\Nuggets;

use App\Contracts\Nuggets\ValidatesNugget;
use Illuminate\Contracts\Validation\Validator;

class ValidateNugget implements ValidatesNugget
{
    /**
     * {@inheritDoc}
     */
    public function __invoke(array $data, bool $update = false): Validator
    {
        $rules = [];

        $messages = [];

        return validator($data, $rules, $messages);
    }
}
