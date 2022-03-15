<?php

namespace App\Actions\Doctrine;

use App\Contracts\Doctrine\ValidatesDoctrine;
use Illuminate\Contracts\Validation\Validator;

final class ValidateDoctrine implements ValidatesDoctrine
{
    public function __invoke(array $data, bool $isUpdate = false): Validator
    {
        $rules = [];

        $messages = [];

        return validator($data, $rules, $messages);
    }
}