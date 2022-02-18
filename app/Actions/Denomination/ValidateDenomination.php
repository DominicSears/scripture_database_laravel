<?php

namespace App\Actions\Denomination;

use App\Contracts\Denomination\ValidatesDenomination;
use Illuminate\Contracts\Validation\Validator;

final class ValidateDenomination implements ValidatesDenomination
{
    public function __invoke(array $data, bool $isUpdate = false): Validator
    {
        $rules = [
            'name' => ['max:255', 'string', 'required'],
            'religion_id' => ['integer', 'required'],
            'parent_id' => ['sometimes', 'integer'],
            'approved' => ['required', 'boolean']
        ];

        $messages = [
            'name.max' => 'Name exceeded 255 characters',
            'name.string' => 'Name must be a string',
            'name.required' => 'Name is required',
            'religion_id.integer' => 'Religion ID must be an integer',
            'religion_id.required' => 'Religion is required',
            'approved.required' => 'Approval status required',
            'approved.boolean' => 'Approval status must be true or false'
        ];

        return validator($data, $rules, $messages);
    }
}