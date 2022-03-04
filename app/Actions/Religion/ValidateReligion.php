<?php

namespace App\Actions\Religion;

use App\Contracts\Religion\ValidatesReligion;
use Illuminate\Contracts\Validation\Validator;

final class ValidateReligion implements ValidatesReligion
{
    public function __invoke(array $data, bool $isUpdate = false): Validator
    {
        $rules = [

        ];

        $messages = [

        ];

        if ($isUpdate) {
            $rules['id'] = [];
            $messages['id.integer'] = '';
            $messages['id.required'] = '';
        }

        return validator($data, $rules, $messages);
    }
}