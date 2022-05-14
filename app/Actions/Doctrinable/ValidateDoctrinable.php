<?php

namespace App\Actions\Doctrinable;

use App\Contracts\Doctrinable\ValidatesDoctrinable;
use Illuminate\Contracts\Validation\Validator;

final class ValidateDoctrinable implements ValidatesDoctrinable
{
    public function __invoke(array $data, bool $isUpdate): Validator
    {
        $rules = [];

        $messages = [];

        return validator($data, $rules, $messages);
    }
}
