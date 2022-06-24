<?php

namespace App\Actions\Doctrinable;

use App\Contracts\Doctrinable\ValidatesDoctrinable;
use Illuminate\Contracts\Validation\Validator;

final class ValidateDoctrinable implements ValidatesDoctrinable
{
    public function __invoke(array $data, bool $isUpdate = false): Validator
    {
        $rules = [
            'doctrine_id' => ['required', 'integer'],
            'doctrinable_id' => ['required', 'integer'],
            'doctrinable_type' => ['string', 'max:255'],
        ];

        $messages = [
            'doctrine_id.required' => 'Doctrine ID is required',
            'doctrine_id.integer' => 'Doctrine ID must be an ID',
            'doctrinable_id.required' => 'Doctrine must have an ID to relate it to',
            'doctrinable_id.integer' => 'Doctrine relation ID must be an ID',
            'doctrinable_type.string' => 'Must provide a type to relate',
            'doctrinable_type.max' => 'The type string exceeds the 255 character limit',
        ];

        return validator($data, $rules, $messages);
    }
}
