<?php

namespace App\Actions\User;

use App\Contracts\User\ValidatesUser;
use Illuminate\Contracts\Validation\Validator;

final class ValidateUser implements ValidatesUser
{
    public function __invoke(array $data, bool $isUpdate = false): Validator
    {
        $rules = [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'gender' => ['required', 'max:1'],
            'username' => ['required', 'string'],
            'coutry_iso_code' => ['integer'],
        ];

        $messages = [
            'first_name.required' => 'First name is required',
            'first_name.string' => 'First name must be a string',
            'last_name.required' => 'Last name is required',
            'gender.required' => 'Gender is required',
            'gender.max' => 'Gender can only be on letter',
            'country_iso_code' => 'Country ISO code must be an integer',
        ];

        if ($isUpdate) {
            $rules['id'] = ['required', 'integer'];
            $messages['id.required'] = 'User ID required for editing';
            $messages['id.integer'] = 'User ID must be an ID';
        }

        return validator($data, $rules, $messages);
    }
}
