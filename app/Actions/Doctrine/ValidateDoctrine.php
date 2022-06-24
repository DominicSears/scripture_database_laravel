<?php

namespace App\Actions\Doctrine;

use App\Contracts\Doctrine\ValidatesDoctrine;
use Illuminate\Contracts\Validation\Validator;

final class ValidateDoctrine implements ValidatesDoctrine
{
    /**
     * @param array $data
     * @param bool $isUpdate
     * @return Validator[]
     */
    public function __invoke(array $data, bool $isUpdate = false): Validator
    {
        $doctrineRules = [
            'created_by' => ['integer', 'required'],
            'title' => ['string', 'max:255'],
            'description' => ['string'],
        ];

        $doctrineMessages = [
            'created_by.integer' => 'Author of doctrine must be an ID',
            'created_by.required' => 'There must be an user who created the doctrine here',
            'title.string' => 'Title must be a string',
            'title.max' => 'You are beyond the 255 character limit',
            'description.string' => 'Description must be a string',
        ];

        if ($isUpdate) {
            $doctrineRules['id'] = ['integer', 'required'];
            $doctrineMessages['id.integer'] = 'Doctrine ID must be an ID';
            $doctrineMessages['id.required'] = 'Doctrine ID required for update';
        }

        return validator($data, $doctrineRules, $doctrineMessages);
    }
}
