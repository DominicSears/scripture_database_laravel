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
            'parent_id' => ['sometimes', 'integer', 'nullable'],
            'approved' => ['required', 'boolean'],
            'created_by' => ['required', 'integer'],
            'description' => ['string', 'min:10', 'nullable']
        ];

        $messages = [
            'name.max' => 'Name exceeded 255 characters',
            'name.string' => 'Name must be a string',
            'name.required' => 'Name is required',
            'religion_id.integer' => 'Religion ID must be an integer',
            'religion_id.required' => 'Religion is required for a denomination',
            'approved.required' => 'Approval status required',
            'approved.boolean' => 'Approval status must be true or false',
            'created_by.required' => 'Must have a creator',
            'created_by.integer' => 'Created by must be an ID',
            'description.string' => 'Description must be a string',
            'description.min' => 'Description must have a minimum of 10 characters'
        ];

        if ($isUpdate) {
            $rules['id'] = ['integer', 'required'];
            $messages['id.integer'] = 'ID must be an integer';
            $messages['id.required'] = 'ID is required for updating a denomination';
        }

        return validator($data, $rules, $messages);
    }
}
