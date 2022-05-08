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
    public function __invoke(array $data, bool $isUpdate = false): array
    {
        $doctrineRules = [
            'created_by' => ['integer', 'required'],
            'title' => ['string', 'max:255'],
            'description' => ['string']
        ];

        $doctrineMessages = [
            'created_by.integer' => 'Author of doctrine must be an ID',
            'created_by.required' => 'There must be an user who created the doctrine here',
            'title.string' => 'Title must be a string',
            'title.max' => 'You are beyond the 255 character limit',
            'description.string' => 'Description must be a string'
        ];

        $doctrinableRules = [
            'doctrine_id' => ['required', 'integer'],
            'doctrinable_id' => ['required', 'integer'],
            'doctrinable_type' => ['string', 'max:255']
        ];

        $doctrinableMessages = [
            'doctrine_id.required' => 'Doctrine ID is required',
            'doctrine_id.integer' => 'Doctrine ID must be an ID',
            'doctrinable_id.required' => 'Doctrine must have an ID to relate it to',
            'doctrinable_id.integer' => 'Doctrine relation ID must be an ID',
            'doctrinable_type.string' => 'Must provide a type to relate',
            'doctrinable_type.max' => 'The type string exceeds the 255 character limit'
        ];

        if ($isUpdate) {
            $doctrineRules['id'] = ['integer', 'required'];
            $doctrineMessages['id.integer'] = 'Doctrine ID must be an ID';
            $doctrineMessages['id.required'] = 'Doctrine ID required for update';
        }

        return [
            validator($data, $doctrineRules, $doctrineMessages),
            validator($data, $doctrinableRules, $doctrinableMessages)
        ];
    }
}
