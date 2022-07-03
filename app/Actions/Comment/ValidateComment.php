<?php

namespace App\Actions\Comment;

use App\Contracts\Comment\ValidatesComment;
use Illuminate\Contracts\Validation\Validator;

final class ValidateComment implements ValidatesComment
{
    public function __invoke(array $data, bool $isUpdate = false): Validator
    {
        $rules = [

        ];

        $messages = [

        ];

        return validator($data, $rules, $messages);
    }
}
