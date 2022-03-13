<?php

namespace App\Actions\Religion;

use App\Contracts\Religion\ValidatesReligion;
use Illuminate\Contracts\Validation\Validator;

final class ValidateReligion implements ValidatesReligion
{
    public function __invoke(array $data, bool $isUpdate = false): Validator
    {
        $rules = [
            'created_by' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'approved' => ['required', 'bool'],
            'parent_id' => ['nullable', 'integer']
        ];

        $messages = [
            'created_by.required' => 'We need to know who created this religion',
            'created_by.integer' => 'Created by must be an ID',
            'name.required' => 'Name of religion is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name exceeded the max amount of characters of 255',
            'approved.required' => 'Approval status is required',
            'approved.bool' => 'Approval must be a boolean',
            'parent_id.integer' => 'Parent ID must be an ID'
        ];

        if ($isUpdate) {
            $rules['id'] = [];
            $messages['id.integer'] = 'Religion ID must be an ID';
            $messages['id.required'] = 'Religion is required for the update';
        }

        return validator($data, $rules, $messages);
    }
}