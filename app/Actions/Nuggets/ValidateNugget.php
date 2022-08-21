<?php

namespace App\Actions\Nuggets;

use Illuminate\Contracts\Validation\Validator;
use App\Contracts\Nuggets\ValidatesNugget;

class ValidateNugget implements ValidatesNugget
{
    /**
     * @inheritDoc
     */
    public function __invoke(array $data, bool $update = false): Validator
    {
        $rules = [];

        $messages = [];

        return validator($data, $rules, $messages);
    }
}
