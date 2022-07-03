<?php

namespace App\Contracts\Comment;

use Illuminate\Contracts\Validation\Validator;

interface ValidatesComment
{
    /**
     * Validates comment data
     *
     * @param  array  $data
     * @param  bool  $isUpdate
     * @return Validator
     */
    public function __invoke(array $data, bool $isUpdate = false): Validator;
}
